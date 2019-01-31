<?php
require_once 'Model/login.php';
require_once 'Model/pedidos.php';
class pedidosController{
    private $model;
    public  $QueryPedidoArray= array();
    public function __construct(){
        
        $this->model=new pedidos();
    }
    public function Pedidos(){
            
            $QueryPedidoArray= $this->QueryPedidoA();
            include_once ('View/admin/pedidos.php');//pedidos.php
            //header("location: View/admin/pedidos.php");
    }
    public function QueryPedidoA(){
        return pedidos::QueryPedidoArray();
    }
}
?>