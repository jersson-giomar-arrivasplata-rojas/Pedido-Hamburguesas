<?php
  $home='home';
  global $QPlatoArray;
  require_once "Controller/".$home."Controller.php";
  $home = ucwords($home) . 'Controller';
  $home = new $home;
  $home->Home();
?>