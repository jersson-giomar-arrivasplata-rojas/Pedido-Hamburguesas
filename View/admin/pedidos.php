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
<div class="" id="Pedidos">
    <div class="div-pedido">
        <div class="panel panel-default">
            <div class="panel-heading">Pedidos Realizados</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <td>Id</td>
                        <td>Precio</td>
                        <td>Fecha-Hora</td>
                        <td>Enviado</td><!--0 1-->
                        <td>Recibido</td><!--0 1-->
                        <td>Opciones</td>
                    </thead>
                    <tbody>
                        
                    <?php
                        while($row=mysqli_fetch_array($QueryPedidoArray)){
                            $idestado=$row['idestado']; 
                            if($idestado==1){
                            $id=$row['id'];
                            $precio=$row['precio'];
                            $fecha=$row['horalisto']; 
                            $mensaje=$row['mensaje'];  
                            $idenviado=$row['idenviado']; 
                            $idrecibido=$row['idrecibido'];
                            $idcliente=$row['idcliente'];  
                            $idrestaurante=$row['idrestaurante'];     
                            //Array
                            $ingredientespedido=$row['ingredientespedido'];
                            $caracteristicaspedido=$row['caracteristicaspedido'];
                            // 
                            if($idenviado==1){
                                $enviado="SI";
                            }else{
                                $enviado="NO";
                            } 
                            if($idrecibido==1){
                                $recibido="SI";
                            }else{
                                $recibido="NO";
                            }                             
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $precio; ?></td>
                            <td><?php echo $fecha; ?></td>
                            <td><?php echo $enviado; ?></td>
                            <td><?php echo $recibido; ?></td>
                            <td><button type="" id="Ver" class="btn "><i class="fa fa-eye fa-2x" aria-hidden="true"></i></button></td>
                            </tr>
                       <?php
                         }
                            }
                        ?>
                        
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
<div id ="PedidosModal" class="container panel  panel-default popup-basic popup-lg mfp-with-anim mfp-hide"><!---->
    <div class=" panel-heading  col-lg-12 col-md-12 col-sm-12 col-xs-12">
         Pedido Realizado
    </div>
    <div class="  panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputid" class="idlabel"> Id </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputId" name="tipo_id" class="form-control" placeholder="ID" required="" autofocus="">             
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="idEnviado" class="idlabel"> Id Enviado </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="idEnviado" name="tipo_idEnviado" class="form-control" placeholder="Id Enviado" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="idRecibido" class="idlabel"> Id Recibido </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="idRecibido" name="tipo_idRecibido" class="form-control" placeholder="Id Recibido" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIdCliente" class="idlabel"> Id Cliente </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputIdCliente" name="tipo_IdCliente" class="form-control" placeholder="Id Cliente" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIdRestaurante" class="idlabel"> Id Restaurante </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputIdRestaurante" name="tipo_idRestaurante" class="form-control" placeholder="Id Restaurante" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputMensaje" class="idlabel"> Mensaje </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <textarea type="text" rows="5" id="inputMensaje" name="tipo_mensaje" class="form-control" placeholder="Mensaje" required="" autofocus="">  </textarea>       
                </div>
            </div>                                 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputPrecio" class="idlabel"> Precio </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputPrecio" name="tipo_precio" class="form-control" placeholder="Precio" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputhoralista" class="idlabel"> Fecha </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputhoralista" name="tipo_horalista" class="form-control" placeholder="Fecha" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIngredientePedidos" class="idlabel">Ingrediente Pedidos </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <textarea type="text" id="inputIngredientePedidos" name="tipo_ingredienteP" rows="6" class="form-control" placeholder="Ingrediente Pedidos" required="" autofocus=""></textarea>           
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputCaracteristicaP" class="idlabel"> Caracteristica Pedidos </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                 <textarea type="text" id="inputCaracteristicaP" name="tipo_caracteristicaP" rows="6" class="form-control" placeholder="Caracteristica Pedidos" required="" autofocus=""></textarea>           
                </div>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
 
        <button type="" id="AceptarPedido" title="Pedido Enviado" class="btn btn-success"><i class="fa fa-check-circle fa-1x" aria-hidden="true"></i></button>
        <button type="" id="RecibidoPedido" title="Pedido Recibido" class="btn btn-info"><i class="fa fa-hand-rock-o fa-1x" aria-hidden="true"></i></button>
        <button type="" id="CancelarPedido" title="Cancelar Pedido" class="btn btn-danger"><i class="fa fa-ban fa-1x" aria-hidden="true"></i></button>
        
        </div>                   
    </div>                       
</div>    
<?php
    include ("footer.php");
    //        <button type="" id="CrearFacturaElectronica" title="Crear Factura" class="btn btn-success"><i class="fa fa-file-text-o fa-1x factura-right" aria-hidden="true"></i></button>

 //   <!--  <button type="" id="EnviarFacturaElectronica" title="Enviar Correo Factura" class="btn btn-info"><i class="fa fa-share-square fa-1x factura-right" aria-hidden="true"></i></button>-- >
    
?>