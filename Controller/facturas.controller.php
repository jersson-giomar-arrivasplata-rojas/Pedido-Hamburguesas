<?php
require_once 'Model/login.php';
require_once 'Model/facturas.php';
class facturas{
    private $model;
    public function __construct(){
        $this->model=new facturas();
    }
    public function Facturas(){
            header("location: View/admin/facturas.php");
    
    }
}
