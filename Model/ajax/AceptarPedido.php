<?php
	$id=$_POST['id'];
	include_once ("../pedidos.php");
	$return_arr= pedidos::QueryPedidoAceptar($id);

/* Toss back results as json encoded array. */
echo  $return_arr;
	 
?>