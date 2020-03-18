<?php
class module_global_feed extends module_global{

	protected $_sModulePath='global/feed';

	public function getView($sView){
		return new _view($this->_sModulePath.'::'.$sView);
	}

	public function _read(){

        $feed=model_feeds::getInstance()->findById( _root::getParam('id') );
        
        $xmlFeed=simplexml_load_file($feed->url);
    
        $feedTitle=$xmlFeed->channel->title;
        $feedDesc=$xmlFeed->channel->description;

        $feedItemList=$xmlFeed->channel->item;

		$oView=$this->getView('detail');
        $oView->title=$feedTitle;
        $oView->description=$feedDesc;
        $oView->itemList=$feedItemList;

		$this->oLayout->add('main',$oView);
    }

    public function _add(){
        $messageList = $this->processAdd();

        $newFeed = new row_feeds();
        $pluginXsrf = new plugin_xsrf();

        $oView = $this->getView('add');
        $oView->newFeed = $newFeed;
        $oView->token = $pluginXsrf->getToken();
        $oView->messageList = $messageList;

        $this->oLayout->add('main', $oView);
    }
    public function processAdd(){
        $pluginXsrf = new plugin_xsrf();

        if (_root::getRequest()->isPost() == false) {
            return array();
        } else if (!$pluginXsrf->checkToken(_root::getParam('token'))) {
            return array('token' => $pluginXsrf->getMessage());
        }

        $paramList = _root::getRequest()->getParams();

        $businessFeeds = new business_feeds(model_feeds::getInstance(), new plugin_sc_valid());

        if (false === $businessFeeds->insertItem(new row_feeds, $paramList)) {
            return $businessFeeds->getReturn()->getData('errorList');
        }

        _root::redirect('global_default::index');
    }

}
