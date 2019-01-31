<?php
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
    $dni=$_POST['dni'];
	$correo=$_POST['correo'];
	$direccion=$_POST['direccion'];
	$celular=$_POST['celular'];
	$mensaje=$_POST['mensaje'];
	$hamburguesa=$_POST['hamburguesa'];
	$TotalPrecio=$_POST['TotalPrecio'];
	$arregloIng=$_POST['arregloIng'];
	$arregloCaract=$_POST['arregloCaract'];

	include_once ("../home.php");
	$result= home::QueryPersonaNaturalFactura($nombre,$apellido,$dni,$correo,$direccion,$celular,$mensaje,$hamburguesa,$TotalPrecio,$arregloIng,$arregloCaract);
/* Toss back results as json encoded array. */
 	echo json_encode($result);
//$_REQUEST['id'];
?>