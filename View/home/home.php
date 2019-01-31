<?php
  // print_r($qplatoArray);
?>
<div class="row pull-right">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="flotante">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 label">
                <label>TOTAL</label>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 input">
                <input type="text" id="precioFlotante" readonly="readonly">
            </div>
        </div>
    </div>
</div>

<div id="index-video"><!--index-video inicio-->
    <video id="bgvid" playsinline="" autoplay="" muted="" loop="">
        <source data-src="<?php echo RUTA_CSS?>images/papachosindex/papachoindex.mp4" type="video/webm" src="http://papachos.com/wp-content/themes/papachos/video/video2.webm">
        <source data-src="<?php echo RUTA_CSS?>images/papachosindex/papachoindex.mp4" type="video/mp4" src="http://papachos.com/wp-content/themes/papachos/video/video2.mp4">
    
    </video>
</div><!--index-video fin-->
<main class="main-index"><!--main-index inicio-->
    <header>
        <img src="assets/images/iconos/papachos.png">
    </header>
    <div class="main-content"><!--main-content inicio-->
        <div class="container index-content"><!--index-content inicio-->
            <select  id="selectBox" onchange="changeFunc();" class="selectpicker select-hamburguesa"><!--select-hamburguesa inicio-->
                <option id="Seleccione" value="0" >Seleccione</option>
                <?php
                    while($row=mysqli_fetch_array($qplatoArray)){
                            $nombreH=$row['nombre'];
                            $idH=$row['id'];
                            $imagenH=$row['imagen'];
                            $logoH=$row['logo'];
                            $precioH=$row['precio'];                                   
                ?>
                <option id="<?php echo $idH?>" class="<?php echo $precioH?>" value="<?php echo $imagenH?>" data-logo="<?php echo $logoH?>" ><?php echo $nombreH;?></option>          
                <?php
                    }
                ?>
            </select><!--select-hamburguesa fin-->
        </div><!--index-content fin-->
        <figure id="HamburguesaFig" class="figure-index"><!--HamburguesaFig inicio-->
            <div class="col-lg-2 col-md-1 col-sm-1 "><!--div col-lg-2  col-md-1 col-sm-1 inicio-->
            </div>
            <div class="col-lg-8 col-md-10  col-sm-10  col-xs-12" id="figure-index-content">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 index-img-first" id="index-img-first"><!--index-img-first inicio-->
                <img class="img-papachos" src="assets/images/iconos/papachos.png">
            </div><!--index-img-first fin-->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 index-img-second"  id="index-img-second"><!--index-img-second inicio-->
                <img class="DHamburguesa-img" src="assets/images/papachoshamburguers/Hdefecto.PNG">
            </div><!--index-img-second fin-->
            </div>
            <div class="col-lg-2 col-md-1 col-sm-1 "><!--div col-lg-2  col-md-1 col-sm-1 inicio-->
            </div>
          
        </figure><!--HamburguesaFig fin-->
            <div class="container Hamburguesa-form"><!--Hamburguesa-form inicio-->
            </div><!--Hamburguesa-form fin-->
    </div><!--main-content fin-->
    <div class="col-lg-2 col-md-1 col-sm-1 "><!--div col-lg-2  col-md-1 col-sm-1 inicio-->
    </div><!--div col-lg-2  col-md-1 col-sm-1 fin-->
    <div class="col-lg-8 col-md-10  col-sm-10  col-xs-12"><!--div col-lg-8 col-md-10  col-sm-10  col-xs-12 inicio-->
      <!--  <form class="form-pedido" method="post" accept-charset="utf-8" action="index.php" name="loginform" autocomplete="off" role="form" >form inicio-->
        <div class="form" id="form">
            <h2 class="form-pedido-heading">Envia tu pedido</h2>
            <div class=""><!--div inicio-->
            <label for="inputTipoFactura" class="tipoFac">Escoja su tipo</label>
            <select  id="selectBoxFac" onchange="ChangeTipoFactura();" class="selectpicker select-tipo">
                <option value="0" >PERSONA NATURAL</option>
                <option value="1" >PERSONA CON EMPRESA</option>
                <option value="2" >EMPRESA</option>
            </select>
            </div><!--div final-->
            <div class="Persona-Natural" id="Persona-Natural"><!--Persona Natural inicio-->
                <div class="row"><!--row inicio-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputNombre" class="">Nombre:</label>
                    <input type="text" id="inputNombre" name="tipo_name" class="form-control" placeholder="Ingresa tu nombre" required autofocus>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputApellido" class="">Apellido:</label>
                    <input type="text" id="inputApellido" name="tipo_apellido" class="form-control" placeholder="Ingresa tu apellido" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputDNI" class="">DNI:</label>
                    <input type="text" id="inputDNI" name="tipo_dni" class="form-control" placeholder="Ingresa tu dni" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCorreo" class="">Correo:</label>
                    <input type="text" id="inputCorreo" name="tipo_correo" class="form-control" placeholder="Ingresa su correo" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputDireccion" class="">Direccion:</label>
                    <input type="text" id="inputDireccion" name="tipo_direccion" class="form-control " placeholder="Ingresa tu direccion" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCelular" class="">Celular:</label>
                    <input type="text" id="inputCelular" name="tipo_celular" class="form-control" placeholder="Ingresa tu celular"  >
                    </div>
                </div><!--row final-->
            </div><!--Persona Natural cierre-->         
            <div class="Persona-Empresa" id="Persona-Empresa"><!--Persona Empresa inicio-->  
                <div class="row"><!--row inicio-->  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputNombre" class="">Nombre:</label>
                    <input type="text" id="inputNombre" name="tipo_name" class="form-control" placeholder="Ingresa tu nombre" required autofocus>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputApellido" class="">Apellido:</label>
                    <input type="text" id="inputApellido" name="tipo_apellido" class="form-control" placeholder="Ingresa tu apellido" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputRUC" class="">RUC:</label>
                    <input type="text" id="inputRUC" name="tipo_ruc" class="form-control" placeholder="Ingresa tu ruc" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCorreo" class="">Correo:</label>
                    <input type="text" id="inputCorreo" name="tipo_correo" class="form-control" placeholder="Ingresa su correo" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="Direccion">
                    <label for="inputDireccionPE" class="">Direccion:</label>
                    <input type="text" id="inputDireccionPE" name="tipo_direccion" class="form-control " placeholder="Ingresa tu direccion" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCelular" class="">Celular:</label>
                    <input type="text" id="inputCelular" name="tipo_celular" class="form-control" placeholder="Ingresa tu celular"  >
                    </div>
                </div><!--row final-->  
            </div><!--Persona Empresa fin-->  
            <div class="Empresa" id="Empresa"><!--Empresa inicio-->
                <div class="row"><!--row inicio-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputNombre" class="">Nombre:</label>
                    <input type="text" id="inputNombre" name="tipo_name" class="form-control" placeholder="Ingresa tu nombre" required autofocus>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputRUC" class="">RUC:</label>
                    <input type="text" id="inputRUC" name="tipo_ruc" class="form-control" placeholder="Ingresa tu ruc" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCorreo" class="">Correo:</label>
                    <input type="text" id="inputCorreo" name="tipo_correo" class="form-control" placeholder="Ingresa su correo" required >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputCelular" class="">Celular:</label>
                    <input type="text" id="inputCelular" name="tipo_celular" class="form-control" placeholder="Ingresa tu celular"  >
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <label for="inputDireccionE" class="">Direccion:</label>
                    <input type="text" id="inputDireccionE" name="tipo_direccion" class="form-control " placeholder="Ingresa tu direccion" required >
                    </div>
                </div><!--row final--> 
            </div><!--Empresa final--> 
            <div id="OK"><!--OK inicio--> 
            </div><!--OK final--> 
            <div class="row"><!--row inicio--> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">     
                    <label for="map" class="">Ubicación:</label>  
                    <div id="map"><!--map inicio--> 
                    </div><!--map final--> 
                </div> 
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">       
                    <!--map final--> 
                    <label for="txtMensaje" class="">Mensaje:</label>
                    <textarea type="text" rows="12" id="txtMensaje" name="tipo_mensaje" class="form-control" placeholder="Ingresa tu mensaje"></textarea>
                </div>
            </div><!--row final--> 
            <div class="row"><!--row inicio--> 
                <div class="col-lg-12 contenedor-btn-pedido"><!--contenedor-btn-pedido inicio--> 
                    <button class="btn btn-lg btn-pedido-persona enviarPedido" type="submit" name="login" id="submit">Enviar Pedido</button>
                <div> <!--contenedor-btn-pedido fin--> 
            </div><!--row final-->
        </div>     
        <!--  </form>form fin-->
    </div><!--div col-lg-8 col-md-10  col-sm-10  col-xs-12 fin-->
    <div class="col-lg-2  col-md-1 col-sm-1"><!--div col-lg-2  col-md-1 col-sm-1 inicio-->
    </div><!--div col-lg-2  col-md-1 col-sm-1 fin-->
</main><!--main-index fin-->
<script type="text/javascript">

   /* (function(){
    })(document);
    */
  function changeFunc() {
            var figure = document.getElementById("figure-index-content");//class=figure-index
            document.getElementById("figure-index-content").innerHTML="";
            var selectBox = document.getElementById("selectBox");//select
            var valor = document.getElementById("selectBox").value;//valor con value
            var id=selectBox.options[selectBox.selectedIndex].id;
            var precioClass=selectBox.options[selectBox.selectedIndex].className;
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;  
        if(id!='Seleccione'){
            $(".flotante").show("slow");
            precioClass="s/"+precioClass;
            $("#precioFlotante").val(precioClass); 
            var col_8 = document.createElement('div');
                col_8.setAttribute('class', ' index-img-first');
                col_8.setAttribute('id', 'index-img-first');
            var col_4 = document.createElement('div');
                col_4.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-12 index-img-second');
                col_4.setAttribute('id', 'index-img-second');
            var col_4_ul = document.createElement('div');
                col_4_ul.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-12 ');
                col_4_ul.setAttribute('id', 'col-4-ul');
            var col_4_img = document.createElement('div');
                col_4_img.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-12 ');
                col_4_img.setAttribute('id', 'col-4-img');
            var col_4_ul_ = document.createElement('div');
                col_4_ul_.setAttribute('class', 'col-lg-4 col-md-4 col-sm-4 col-xs-12 ');
                col_4_ul_.setAttribute('id', 'col-4-ul_');
            figure.appendChild(col_8);
            figure.appendChild(col_4);
            document.getElementById("index-img-first").appendChild(col_4_ul);
            document.getElementById("index-img-first").appendChild(col_4_img);
            document.getElementById("index-img-first").appendChild(col_4_ul_);
            var div = document.createElement('div');
                document.getElementById("col-4-ul").appendChild(div);
            var div_ = document.createElement('div');
                document.getElementById("col-4-ul_").appendChild(div_);
            var img = document.createElement('img');
                div.setAttribute('class', 'ingrediente-first');
                div.setAttribute('id', 'ingrediente-first');
                div_.setAttribute('class', 'caracteristica-first');
                div_.setAttribute('id', 'caracteristica-first');
                img.setAttribute('src', 'assets/images/papachoshamburguers/'+valor);
                var logo_hamburguesa=$("#"+id).attr('data-logo');
            var logo=document.createElement('img');//mamacha-logo   /    mamacha-bg
                logo.setAttribute('src', 'assets/images/logotipos/'+logo_hamburguesa);
                logo.setAttribute('class', 'img-logo');
                document.getElementById("col-4-img").appendChild(logo);
                document.getElementById("col-4-img").appendChild(img);
                document.getElementById("ingrediente-first").style.display = "block  !important";
            //JSON.stringify(  //   dataType: "json",
            var values = {id:id};
            $.ajax({
                url: "Model/ajax/ingredientes.php",
                type: "post",
                data: values ,
                success: function (datos) {
                    var resultado=JSON.parse(datos); 
                    console.log(resultado);
                    var longitud=Object.keys(resultado).length;
                    var ingredienteString="";   
                        $("#ingrediente-first").html("<div class='Ingrediente-cabecera'>INGREDIENTES</div><hr><div class='ingrediente-body' id='ingrediente-body'></div>");
                        for( i=0; i<longitud;i++){
                            ingredienteString+= "<li><span>s/"+resultado[i][i].precio+"</span><span>"+resultado[i].nombre+"</span>"
                            +"<div class='check-main'><input id="+resultado[i][i].precio+" type='checkbox' aria-label='...' class='check-tipo '>"
                            +"<div class='spinner-input'><div class='input-group spinner' data-trigger='spinner'>"
                            +"<input id='ING"+i+"' type='text' class='form-control text-center' value='0' data-rule='quantity' readonly='readonly'>"
                            +"<span class='input-group-addon'><a onclick='aumentarCantidad(this)'  class='spin-up' data-spin='up'>"
                            +"<i class='fa fa-caret-up'></i></a><a onclick='disminuirCantidad(this)'  class='spin-down' data-spin='down'>"
                            +"<i class='fa fa-caret-down'></i></a></span>"
                            +"</div></div></div></li><br/>";   
                        }
                            ingredienteString=ingredienteString.substring(0, ingredienteString.length);
                        $("#ingrediente-body").html("<ul class='ingrediente-body-ul' data-longitud="+longitud+">"+ingredienteString+"</ul><hr><span class='span-ingrediente'>AGRADECEMOS SU PREFERENCIA</span>");
                        /*----------------------------------------------*/
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });

            $.ajax({
                url: "Model/ajax/adherir.php",
                type: "post",
                data: values ,
                success: function (datos) {
                    var resultado=JSON.parse(datos); 
                    console.log(resultado);
                    var longitud=Object.keys(resultado).length;
                     var caracteristicaString="";   
                        /*----------------------------------------------*/
                        $("#caracteristica-first").html("<div class='caracteristica-cabecera'>ADHERIR</div><hr><div class='caracteristica-body' id='caracteristica-body'></div>");
                        for( i=0; i<longitud;i++){
                            caracteristicaString+= "<li><span>s/"+resultado[i][i].precio+"</span><span>"+resultado[i].nombre+"</span>"
                            +"<div class='check-main-2'><input id="+resultado[i][i].precio+" type='checkbox' aria-label='...' class='check-tipo '>"
                            +"<div class='spinner-input'><div class='input-group spinner' data-trigger='spinner'>"
                            +"<input id='CAR"+i+"' type='text' class='form-control text-center' value='0' data-rule='quantity' readonly='readonly'>"
                            +"<span class='input-group-addon'><a onclick='aumentarCantidad(this)' class='spin-up' data-spin='up'>"
                            +"<i class='fa fa-caret-up'></i></a><a onclick='disminuirCantidad(this)' class='spin-down' data-spin='down'>"
                            +"<i class='fa fa-caret-down'></i></a></span>"
                            +"</div></div></div></li><br/>";                      
                       }
                            caracteristicaString=caracteristicaString.substring(0, caracteristicaString.length);
                        $("#caracteristica-first #caracteristica-body").html("<ul class='caracteristica-body-ul' data-longitud="+longitud+">"+caracteristicaString+"</ul>");
                
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }else
        if(id=='Seleccione'){
            $(".flotante").hide("slow");
            $("#precioFlotante").val(""); 
            var col_6_first = document.createElement('div');
                col_6_first.setAttribute('class', 'col-lg-6 col-md-6 col-sm-6 col-xs-12 index-img-first');
                col_6_first.setAttribute('id', 'index-img-first');
            var col_6_second = document.createElement('div');
                col_6_second.setAttribute('class', 'col-lg-6 col-md-6 col-sm-6 col-xs-12 index-img-second');
                col_6_second.setAttribute('id', 'index-img-second');
                document.getElementById("figure-index-content").appendChild(col_6_first);
                document.getElementById("figure-index-content").appendChild(col_6_second);
            var img = document.createElement('img');
                img.setAttribute('src', 'assets/images/iconos/papachos.png');
                img.setAttribute('class', 'img-papachos');
                document.getElementById("index-img-first").appendChild(img);
            var img2 = document.createElement('img');
                img2.setAttribute('src', 'assets/images/papachoshamburguers/Hdefecto.PNG');
                img2.setAttribute('class', 'DHamburguesa-img');
                document.getElementById("index-img-second").appendChild(img2);
        }
        if(id!="PL000000"){
            $(".img-logo").css('filter','invert(0)');
        }
    }
    function ChangeTipoFactura(){
            var selectFac = document.getElementById("selectBoxFac");//select
            var valorFac = document.getElementById("selectBoxFac").value;//valor con value
            var selectedValueFac = selectBox.options[selectBox.selectedIndex].value;
            var PN = document.getElementsByClassName("Persona-Natural");
            var PE = document.getElementsByClassName("Persona-Empresa");
            var E = document.getElementsByClassName("Empresa");
        if(valorFac==0){
                PN[0].style.display = "block";       
                PE[0].style.display = "none";
                E[0].style.display = "none";
        }
        if(valorFac==1){
                PN[0].style.display = "none";       
                PE[0].style.display = "block";
                E[0].style.display = "none";
        }
        if(valorFac==2){
                PN[0].style.display = "none";       
                PE[0].style.display = "none";
                E[0].style.display = "block";
        }
        $("#Persona-Natural input, textarea").val('');
        $("#Persona-Empresa input, textarea").val('');
        $("#Empresa input, textarea").val('');

    }

</script>


