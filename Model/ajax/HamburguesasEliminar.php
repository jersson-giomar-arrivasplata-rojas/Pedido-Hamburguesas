<?php
	$id=$_POST['id'];
	include_once ("../hamburguesas.php");
	$return_arr= hamburguesas::QueryHamburguesaDelete($id);

/* Toss back results as json encoded array. */
echo  $return_arr;
	 
?>