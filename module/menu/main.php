<?php 
class module_menu extends abstract_module{

    public function _index(){

        $linkList=array(
            'Accueil'=>'global_default::index',
        );

        $oView=new _view('menu::index');
        $oView->linkList=$linkList;

        return $oView;
    }


}