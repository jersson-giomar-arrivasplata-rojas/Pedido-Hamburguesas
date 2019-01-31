<?php
    $id=$_POST['id'];
    $idHamburguesa=$_POST['idHamburguesa'];
	include_once ("../ingredientes.php");
	$return_arr= ingredientes::QueryIngredientesPlatoAsignar($id,$idHamburguesa);
 	echo $return_arr;
//$_REQUEST['id'];
?>