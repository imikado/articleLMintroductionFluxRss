<?php
 
require __DIR__.'/../autoload_unitaire.php';

use PHPUnit\Framework\TestCase;
 
final class businessFeedsTest extends TestCase {

    public function test_insertItemShoulFinishOk(){

        $mockModel = $this->createMock('interface_model');
        $pluginValid=new plugin_sc_valid();

        $business=new business_feeds($mockModel,$pluginValid);

        $paramList=array(
            'title'=>null,
            'url'=>null,
        );

        $state=$business->insertItem(new  stdclass(), $paramList);
        $this->assertFalse($state);

        $expectedErrorList=array(
            'title'=>array('Le champ "titre" ne doit pas etre vide'),
            'url'=>array('Le champ "url" ne doit pas etre vide','Le champ "url" n est pas une url valide')
        );

        $this->assertEquals($expectedErrorList,$business->getReturn()->getData('errorList') );
    }
}