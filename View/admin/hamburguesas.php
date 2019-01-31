<?php
    global $ultimo_id;
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

<div class="Hamburguesas" id="Hamburguesas">
    <div class="div-hamburguesas">
        <div class="panel panel-default">
            <div class="panel-heading">Hamburguesas</div>                  
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button type="" id="Agregar"  class="btn btn-success">Agregar</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <button type="" id="Actualizar" class="btn btn-primary ">Actualizar</button>
                        </div>
                    </div>           
                    <table class="table">
                        <thead>
                            <td>Id</td>
                            <td>Nombre</td>
                            <td>Precio</td>
                            <td>logo</td><!--0 1-->
                            <td>Imagen</td><!--0 1-->
                            <td>Opciones</td>
                        </thead>
                    <?php
                        while($row=mysqli_fetch_array($QueryHamburguesaArray)){
                            //idtplato='PT000000' AND
                            $idestado=$row['idestado']; 
                            $idtplato=$row['idtplato'];
                            if($idestado==1 && $idtplato=='PT000000'){
                            $id=$row['id'];
                            $nombre=$row['nombre'];
                            $ingredientes=$row['ingredientes']; 
                            $precio=$row['precio'];  
                            $descripcion=$row['descripcion']; 
                            $imagen=$row['imagen'];
                            $logo=$row['logo'];  
                            $idoferta=$row['idoferta'];                                        
                        ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo $precio; ?></td>
                            <td><img src="<?php echo RUTA_IMG.'logotipos/'.$logo; ?>" alt="logo" class="Hamburguesas-logo"></td>
                            <td><img src="<?php echo RUTA_IMG.'papachoshamburguers/'.$imagen; ?>" alt="imagen" class="Hamburguesas-img"></td>
                            <td>
                            <button type="" id="Ver" title="Ver Hamburguesa" class="btn "><i class="fa fa-eye fa-2x" aria-hidden="true"></i></button>
                            <button type="" id="Adicionar" title="Adicionar" class="btn btn-info "><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button>
                            <button type="" id="Eliminar" title="Eliminar Hamburguesa" class="btn btn-danger"><i class="fa fa-ban fa-2x" aria-hidden="true"></i></button>
                            </td>
                            <td class="ingredientes-td"><?php echo $ingredientes; ?></td>
                        </tr>  
                       <?php
                            }
                            $ultimo_id=$row['id'];
                                }
                        ?>
                        
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
<div id="ID_ULTIMO" data-id="<?php echo $ultimo_id?>"></div>
<div id ="HamburguesaModal" class="container panel  panel-default popup-basic popup-lg mfp-with-anim mfp-hide"><!---->
    <div class=" panel-heading  col-lg-12 col-md-12 col-sm-12 col-xs-12">
        Hamburguesa
    </div>
    <div class="  panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputid" class="idlabel"> Id (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="inputId" name="tipo_id" class="form-control" placeholder="ID" required="" autofocus="" disabled>             
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="idNombre" class="idlabel">Nombre (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="idNombre" name="tipo_idNombre" class="form-control" placeholder="Nombre" required="" autofocus="">             
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="idPrecio" class="idlabel"> Precio (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <input type="text" id="idPrecio" name="tipo_idPrecio" class="form-control" placeholder="Precio" required="" autofocus="">             
                </div>
            </div>
  
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIngredientes" class="idlabel"> Ingredientes (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <textarea type="text" rows="5" id="inputIngredientes" name="tipo_Ingredientes" class="form-control" placeholder="Ingredientes" required="" autofocus="">  </textarea>       
                </div>
            </div>    
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputDescripcion" class="idlabel"> Descripcion (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <textarea type="text" rows="5" id="inputDescripcion" name="tipo_Descripcion" class="form-control" placeholder="Descripcion" required="" autofocus="">  </textarea>       
                </div>
            </div>                                 
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputImagen" class="idlabel"> Imagen (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <img id="inputImagen" name="tipo_Imagen" class="form-control" src="">  
                    <input type="file" name="Imagen-Hamburguesa" value="Imagen-Hamburguesa" id="Imagen-Hamburguesa">           
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputLogo" class="idlabel"> Logo (*) </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <img id="inputLogo" name="tipo_Logo" class="form-control" src="">              
                    <input type="file" name="Logo-Hamburguesa" value="Logo-Hamburguesa" id="Logo-Hamburguesa"> 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIdoferta" class="idlabel">Id Oferta </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <input type="text" id="inputIdoferta" name="tipo_Idoferta"  class="form-control" placeholder="Id Oferta" required="" autofocus="">       
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <label for="inputIdtplato" class="idlabel"> id Tipo Plato (*)  </label>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <input type="text"  id="inputIdtplato" name="tipo_Idtplato" value="PT000000" class="form-control" placeholder="Id tipo plato" required="" autofocus="" disabled>           
                </div>
            </div>

        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
 
        <button type="" id="GuardarHamburguesa" title="Hamburguesa" class="btn btn-success"><i class="fa fa-floppy-o fa-1x" aria-hidden="true"></i></button>

        
        </div>                   
    </div>                       
</div> 

<div id ="AdherirModal" class="container panel  panel-default popup-basic popup-lg mfp-with-anim mfp-hide"><!---->
    <div class=" panel-heading  col-lg-12 col-md-12 col-sm-12 col-xs-12">
        Adherir a la Hamburguesa
       
        <input type="text" id="input-checkbox" disabled>
    </div>
    <div class="  panel-body col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="row adherir-center" >
                <label for="" class=""> Agregar Ingredientes</label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="AdherirCheckedIngredientes">

            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                <div class="row" id="AdherirCheckedIngredientes_1">
               
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                <div class="row" id="AdherirCheckedIngredientes_2">
               
                </div>
            </div>               
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
       
            <div class="row adherir-center">
                <label for="" class=""> Agregar Caracteristicas</label>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="AdherirCheckedCaracteristica">
               
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">  
                <div class="row" id="AdherirCheckedCaracteristica_1">
               
                </div>
            </div> 
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row" id="AdherirCheckedCaracteristica_2">
            
                </div>
            </div>
    </div>                       
</div> 
<?php
    include ("footer.php");
    //        <button type="" id="CrearFacturaElectronica" title="Crear Factura" class="btn btn-success"><i class="fa fa-file-text-o fa-1x factura-right" aria-hidden="true"></i></button>

 //   <!--  <button type="" id="EnviarFacturaElectronica" title="Enviar Correo Factura" class="btn btn-info"><i class="fa fa-share-square fa-1x factura-right" aria-hidden="true"></i></button>-- >
    
?>