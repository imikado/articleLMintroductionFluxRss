<?php 
class business_feeds extends business_abstract{

    protected $model;
	protected $validator;
	protected $columnList = array('title','url',);

	public function __construct(interface_model $model_, interface_valid $validator_) {
		$this->model = $model_;
		$this->validator = $validator_;
	}

	public function getCheck($paramList_) {
		$this->validator->load($paramList_);

		$this->validator->isNotEmpty('title', 'Le champ "titre" ne doit pas etre vide');
		$this->validator->isNotEmpty('url', 'Le champ "url" ne doit pas etre vide');
		$this->validator->matchExpression('url','/^http[s]?:\/\//','Le champ "url" n est pas une url valide');
		
		return $this->validator;
	}

	public function insertItem($newFeed_,$paramList_) {
		$valid = $this->getCheck($paramList_);
		if (!$valid->isValid()) {
			return $this->sendReturn(false, array('errorList' => $valid->getListError()));
		}

		foreach ($this->columnList as $column) {
			$newFeed_->$column = $paramList_[$column];
		}

		$this->model->insert($newFeed_);


		return true;
	}
}