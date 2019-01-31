<?php
  //global $login;
  $Hamburguesas='hamburguesas';
 
  require_once "Controller/$Hamburguesas.controller.php";
  $Hamburguesas = ucwords($Hamburguesas) . 'Controller';
  $Hamburguesas = new $Hamburguesas;
  $Hamburguesas->Hamburguesas();
/* echo('ok');*/
?>
