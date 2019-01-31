<?php
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $precio=$_POST['precio'];
    $ingredientes=$_POST['ingredientes'];
    $descripcion=$_POST['descripcion'];
    $imagen=$_POST['imagen'];
    $logo=$_POST['logo'];
    $idoferta=$_POST['idoferta'];
    $idplato=$_POST['idplato'];

	include_once ("../hamburguesas.php");
	$return_arr= hamburguesas::QueryHamburguesaAgregar($id,$nombre,$precio,$ingredientes,$descripcion,$imagen,$logo,$idoferta,$idplato);

/* Toss back results as json encoded array. */
echo  $return_arr;
     


?>