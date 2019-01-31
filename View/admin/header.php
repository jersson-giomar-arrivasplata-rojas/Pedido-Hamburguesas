<?php
           // <li><a href="<?php echo SERVIDOR index.php/login/facturas">Facturas</a></li>
?>
<!DOCTYPE html>
<html >
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">  
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_FONTS ?>font-awesome.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>animate.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>bk_style.css" type="text/css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>font-family.css" type="text/css">

  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand " href="<?php echo SERVIDOR ?>index.php">PAPACHOS<span class="sr-only">(current)</span></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a id="SeleccionHamburguesa" href="<?php echo SERVIDOR ?>index.php/login/hamburguesas">Hamburguesas</a></li>
            <li><a id="SeleccionPedidos" href="<?php echo SERVIDOR ?>index.php/login/pedidos">Pedidos</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a id="Logoutid" href="<?php echo SERVIDOR ?>index.php/login.php?logout" title="Salir"><i class="fa fa-sign-in fa-2x" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>

