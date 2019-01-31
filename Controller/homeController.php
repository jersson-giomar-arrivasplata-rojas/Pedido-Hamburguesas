<?php
require_once 'Model/home.php';//base
class homeController{
    private $model;
    public $qplatoArray=array();
    public function __construct(){
        $this->model=new home();
    }
    //$sitio -> Home()
    public function Home(){
        $qplatoArray = $this->QPlatoArray();
        require_once  ('View/home/header.php');
        require_once ('View/home/home.php');
        require_once ('View/home/footer.php');
    }
    public function QPlatoArray(){
        //return $qplatoArray=home::QueryPlatoArray();
        return home::QueryPlatoArray();//static
    }
    

}

?>