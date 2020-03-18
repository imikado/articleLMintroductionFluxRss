<?php
class module_global_default extends module_global{

	protected $_sModulePath='global/default';

	public function getView($sView){
		return new _view($this->_sModulePath.'::'.$sView);
	}

	public function _index(){

		$feedList=model_feeds::getInstance()->findAll();

		$oView=$this->getView('index');
		$oView->feedList=$feedList;

		$this->oLayout->add('main',$oView);
	}


}
