<?php
  //global $login;
  $login='login';
  require_once "Controller/$login.controller.php";
  $login = ucwords($login) . 'controller';
  $login = new $login;
  $login->Login();
/* echo('ok');*/
?>
