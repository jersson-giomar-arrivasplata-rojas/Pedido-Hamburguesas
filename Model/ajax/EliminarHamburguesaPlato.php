<?php
    $id=$_POST['id'];
    $idHamburguesa=$_POST['idHamburguesa'];
	include_once ("../plato.php");
	$return_arr= plato::QueryPlatoPlatoEliminar($id,$idHamburguesa);
 	echo $return_arr;
//$_REQUEST['id'];
?>