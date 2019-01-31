<?php
	$id=$_POST['id'];
	include_once ("../home.php");
	$return_arr = array();
	$qingredienteArray=array();
	$qingredienteArray= home::QueryIngrediente($id);
		while ($row = mysqli_fetch_array($qingredienteArray)){
			$nombre['nombre']=$row['nombre'];
			$precio['precio']=$row['precio'];
			array_push($nombre,$precio);
			$precio['precio']=0;
			array_push($return_arr,$nombre);
		//	array_push($return_arr,$ingrediente);
			//array_push($return_arr,$precio);
    	}	
/* Toss back results as json encoded array. */
 	echo json_encode($return_arr, JSON_FORCE_OBJECT);
//$_REQUEST['id'];
?>