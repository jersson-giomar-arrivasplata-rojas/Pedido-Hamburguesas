<?php
	$id=$_POST['id'];
	include_once ("../caracteristicas.php");
    $return_arr = array();
    $selectCaract_=array();
    $selectCaracteristicaplato=caracteristicas::QueryCaracteristicaPlatoArray($id);
    while ($row_ = mysqli_fetch_array($selectCaracteristicaplato)){
        $id_['idpb']=$row_['idpb'];
        $id_['idplato']=$row_['idplato'];
        array_push($selectCaract_,$id_);
    }	
	$qcaracteristicaArray= caracteristicas::QueryCaracteristicasArray();
		while ($row = mysqli_fetch_array($qcaracteristicaArray)){
        $iD['id']=$row['id'];
        $nombre['nombre']=$row['nombre'];
        $precio['precio']=$row['precio'];  
        array_push($return_arr,$iD,$nombre,$precio,$selectCaract_);
    }	
   
/* Toss back results as json encoded array. */
 	echo json_encode($return_arr);
//$_REQUEST['id'];
?>