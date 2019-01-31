<?php
    $id=$_POST['id'];
    $idHamburguesa=$_POST['idHamburguesa'];
	include_once ("../bebida.php");
	$return_arr= bebida::QueryBebidaPlatoEliminar($id,$idHamburguesa);
 	echo $return_arr;
//$_REQUEST['id'];
?>