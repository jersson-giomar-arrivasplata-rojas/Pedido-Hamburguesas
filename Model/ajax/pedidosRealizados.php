<?php
	$id=$_POST['id'];
	include_once ("../pedidos.php");
	$return_arr= pedidos::QueryPedidoIDArray($id);
	while($row=mysqli_fetch_array($return_arr)){
		$idestado=$row['idestado']; 
		if($idestado==1){
		$id=$row['id'];
		$precio=$row['precio'];
		$fecha=$row['horalisto']; 
		$mensaje=$row['mensaje'];  
		$idenviado=$row['idenviado']; 
		$idrecibido=$row['idrecibido'];
		$idcliente=$row['idcliente'];  
		$idrestaurante=$row['idrestaurante'];     
		//Array
		$ingredientespedido=$row['ingredientespedido'];
		$caracteristicaspedido=$row['caracteristicaspedido'];
	}

}
$return_array = array($idestado,$id,$precio,$fecha,$mensaje,$idenviado,$idrecibido,$idcliente,$idrestaurante,json_encode($ingredientespedido),json_encode($caracteristicaspedido));
/* Toss back results as json encoded array. */
echo  json_encode($return_array);
	 
?>