<?php
	$id=$_POST['id'];
	include_once ("../home.php");
	$return_arr = array();
	$qplatoArray=array();
	$qplatoArray= home::QueryAdherir($id);
		while ($row = mysqli_fetch_array($qplatoArray)){
			$nombre['nombre']=$row['nombre'];
			$precio['precio']=$row['precio'];
			array_push($nombre,$precio);
			array_push($return_arr,$nombre);
		//	array_push($return_arr,$ingrediente);
			//array_push($return_arr,$precio);
    	}	
/* Toss back results as json encoded array. */
 	echo json_encode($return_arr, JSON_FORCE_OBJECT);
//$_REQUEST['id'];
?>