<?php
	$id=$_POST['id'];
	include_once ("../ingredientes.php");
    $return_arr = array();
    $IngredienteArray_=array();
    $IngredienteArray=array();
    $selectIngredientesplato=ingredientes::QueryIngredientesPlatoArray($id);


    while ($row_ = mysqli_fetch_array($selectIngredientesplato)){
        $id_['idingrediente']=$row_['idingrediente'];
        $id_['idplato']=$row_['idplato'];
        array_push($IngredienteArray_,$id_);
    }	
    $IngredienteArray= ingredientes::QueryIngredientesArray();
        while ($row = mysqli_fetch_array($IngredienteArray)){
        $iD['id']=$row['id'];
        $nombre['nombre']=$row['nombre'];
        $precio['precio']=$row['precio'];  
        array_push($return_arr,$iD,$nombre,$precio,$IngredienteArray_);
    }	
   
/* Toss back results as json encoded array. */
 	echo json_encode($return_arr);
//$_REQUEST['id'];
// idpb
?>