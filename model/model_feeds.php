<?php
class model_feeds extends abstract_model implements interface_model{
  
   protected $sClassRow='row_feeds';
  
   protected $sTable='feeds';
   protected $sConfig='fluxRssMysql';
  
   protected $tId=array('id');

   public static function getInstance(){
       return self::_getInstance(__CLASS__);
   }

   public function findById($id){
       return $this->findOne('SELECT * FROM '.$this->sTable.' WHERE id=?',$id );
   }
   public function findAll(){
       return $this->findMany('SELECT * FROM '.$this->sTable.' ORDER BY id ASC');
   }
  
}

class row_feeds extends abstract_row{
  
   protected $sClassModel='model_feeds';
  
}