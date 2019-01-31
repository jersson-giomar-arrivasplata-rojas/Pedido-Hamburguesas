<?php
  //global $login;
  $pedidos='pedidos';
  require_once "Controller/$pedidos.controller.php";
  $pedidos = ucwords($pedidos) . 'Controller';
  $pedidos = new $pedidos;
  $pedidos->Pedidos();

 // global $QueryPedidoArray=array();  
  /* echo('ok');*/
?>
