<?php
require_once 'Model/login.php';
require_once 'Model/hamburguesas.php';
class hamburguesasController{
    private $model;
    public  $QueryHamburguesaArray= array();
    public function __construct(){
        
        $this->model=new hamburguesas();
    }
    public function Hamburguesas(){
        $QueryHamburguesaArray= $this->QueryHamburguesasA();
        require_once 'View/admin/hamburguesas.php';
      //  header("location: View/admin/hamburguesas.php");
    }
    public function QueryHamburguesasA(){
        return hamburguesas::QueryHamburguesasArray();
    }
}
   
?>