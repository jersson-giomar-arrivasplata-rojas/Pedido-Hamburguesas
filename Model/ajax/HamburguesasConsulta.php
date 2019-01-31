<?php
	$id=$_POST['id'];
	include_once ("../hamburguesas.php");
	$return_arr= hamburguesas::QueryHamburguesasIDArray($id);
	while($row=mysqli_fetch_array($return_arr)){
		$idestado=$row['idestado']; 
		if($idestado==1){
        $id=$row['id'];
        $nombre=$row['nombre'];
        $ingredientes=$row['ingredientes']; 
        $precio=$row['precio'];  
        $descripcion=$row['descripcion']; 
        $imagen=$row['imagen'];
        $logo=$row['logo'];  
        $idoferta=$row['idoferta'];  
        $idtplato=$row['idtplato'];    
	}

}
$return_array = array($idestado,$id,$nombre,$precio,$descripcion,$imagen,$logo,$idoferta,$idtplato);
/* Toss back results as json encoded array. */
echo  json_encode($return_array);
	 
?>