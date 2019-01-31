<?php
  //global $login;
  $facturas='facturas';
  require_once "Controller/$facturas.controller.php";
  $facturas = ucwords($facturas) . 'controller';
  $facturas = new $facturas;
  $facturas->Facturas();
/* echo('ok');*/
?>
