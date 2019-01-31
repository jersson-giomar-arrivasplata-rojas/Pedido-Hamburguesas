<?php
    session_start();
    if(!isset($_SESSION['user_login_status'])AND
        $_SESSION['user_login_status']!=1){
        header("location: login.php");
        exit;
    }
?>
<?php
    include_once ("Model/connection/db.php");
    include ("header.php");
?>
<div class="" id="Facturas">
    <div class="div-pedido">
        <div class="panel panel-default">
            <div class="panel-heading">Facturas Realizadas</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <td>Id</td>
                        <td>Total Bruto</td>
                        <td>Descuento</td><!--0 1-->
                        <td>Total Neto</td><!--0 1-->
                        <td>Id Pedido</td>
                        <td>Opciones</td>
                    </thead>
                    <tbody>
                        <tr></tr>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
<?php
    include ("footer.php");
?>