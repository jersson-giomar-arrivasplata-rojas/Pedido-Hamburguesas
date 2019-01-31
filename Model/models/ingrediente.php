<?php
class ingrediente{
    public $nombreArray=array();
    public function __CONSTRUCT(){

    }
    
    public function getNombreArray(){
    return $this->nombreArray;
    }
    public function setNombreArray($nombreArray){
    $this->nombreArray=$nombreArray;
    }
    
}
?>