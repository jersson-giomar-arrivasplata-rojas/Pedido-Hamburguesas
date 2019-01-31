<?php
	include_once ("../hamburguesas.php");
	$return_arr= hamburguesas::QueryHamburguesasArray();

/* Toss back results as json encoded array. */
echo  $return_arr;
	 
?>