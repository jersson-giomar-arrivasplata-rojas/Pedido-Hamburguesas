jQuery(document).ready(function($) {
    
    var hamburguesas=$("#Hamburguesas .panel-heading").text();
    if(hamburguesas=="Hamburguesas"){
        $("#SeleccionHamburguesa").css('background-color','white');
        $("#SeleccionHamburguesa").css('color','black');
        $("#SeleccionHamburguesa").css('font-weight','bolder');
    }else{
        $("#SeleccionHamburguesa").css('background-color','#121212');
        $("#SeleccionHamburguesa").css('color','white');
        $("#SeleccionHamburguesa").css('font-weight','bolder');
    }

   
    var pedidos=$("#Pedidos .panel-heading").text();
    if(pedidos=="Pedidos Realizados"){
        $("#SeleccionPedidos").css('background-color','white');
        $("#SeleccionPedidos").css('color','black');
        $("#SeleccionPedidos").css('font-weight','bolder');
    }else{
        $("#SeleccionPedidos").css('background-color','#121212');
        $("#SeleccionPedidos").css('color','white');
        $("#SeleccionPedidos").css('font-weight','bolder');
    }

    $(this).on('click',"#Pedidos #Ver",function (){
        var id=$(this).parents('tr').find('td').first().text();
        //alert(id);
        var values={id:id};
        $.ajax({
                url: "../../Model/ajax/pedidosRealizados.php",
                type: "post",
                data: values ,
                success: function (datos) {
                    var resultado=JSON.parse(datos); 
                    //console.log(resultado);
                    var longitud=Object.keys(resultado).length;
                    var ingredienteString=""; 
                    //console.log(datos);
                    if(datos.length>0){
                        $("#PedidosModal input,#PedidosModal textarea").val("");
                        $("#inputId").val(resultado[1]);
                        $("#idEnviado").val(resultado[5]);
                        $("#idRecibido").val(resultado[6]);
                        $("#inputIdCliente").val(resultado[7]);
                        $("#inputIdRestaurante").val(resultado[8]);
                        $("#inputMensaje").val(resultado[4]);
                        $("#inputPrecio").val(resultado[2]);
                        $("#inputhoralista").val(resultado[3]);
                            var caracteristicas = resultado[10].split(";");
                            var contenidocaracteristicas="";
                            caracteristicas.forEach(function(f){
                                contenidocaracteristicas+=f+"\n";
                            });
                            $("#inputCaracteristicaP").val(contenidocaracteristicas.replace(/\\/g,"").replace(/[ '"]+/g, ' '));

                            var ingredientes = resultado[9].split(";");
                            var contenidoingrediente="";
                            ingredientes.forEach(function(e){
                                contenidoingrediente+=e+"\n";
                            });
                            $("#inputIngredientePedidos").val(contenidoingrediente.replace(/\\/g,"").replace(/[ '"]+/g, ' '));
                            var array="Array";
                            if($("#inputCaracteristicaP").val().trim().replace(/[ '"]+/g, ' ').toString().trim()=="Array"){
                                $("#inputCaracteristicaP").val("");
                            }
                            if($("#inputIngredientePedidos").val().trim().replace(/[ '"]+/g, ' ').toString().trim()=="Array"){
                                $("#inputIngredientePedidos").val("");
                            }
                            
                       
                   
                        popupPedido();

                    }else{
                        swal({title:"Error!!",
                            text:"Se corregira en los proximos minutos",
                            className: "swal-text",
                            button: false
                            },
                                );
                    }
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
            }
        });

    });
   
   $(this).on('click','#AceptarPedido',function(){
        var id=$("#inputId").val();
        var values={id:id};
        $.ajax({
            url: "../../Model/ajax/AceptarPedido.php",
            type: "post",
            data: values ,
            success: function (datos) {

                if(datos=="1"){
                    swal({title:"Felicitaciones!!",
                    text:"Pedido aceptado con exito",
                    className: "swal-text",
                    button: false
                    },); 
                    $.magnificPopup.close();

                }else{
                    swal({title:"Error!!",
                        text:"Se corregira en los proximos minutos",
                        className: "swal-text",
                        button: false
                        },
                          );
                }
            
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
        }
    });
   }); 
   $(this).on('click','#CancelarPedido',function(){
    var id=$("#inputId").val();
    var values={id:id};
    $.ajax({
        url: "../../Model/ajax/CancelarPedido.php",
        type: "post",
        data: values ,
        success: function (datos) {

            if(datos=="1"){
                swal({title:"Felicitaciones!!",
                text:"Pedido cancelado con exito",
                className: "swal-text",
                button: false
                },); 
                $.magnificPopup.close();
            }else{
                swal({title:"Error!!",
                    text:"Se corregira en los proximos minutos",
                    className: "swal-text",
                    button: false
                    },
                        );
            }
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
    }
    });
    });
    $(this).on('click','#RecibidoPedido',function(){
        var id=$("#inputId").val();
        var values={id:id};
        $.ajax({
            url: "../../Model/ajax/RecibidoPedido.php",
            type: "post",
            data: values ,
            success: function (datos) {
    
                if(datos=="1"){
                    swal({title:"Felicitaciones!!",
                    text:"Pedido recibido con exito",
                    className: "swal-text",
                    button: false
                    },); 
                    $.magnificPopup.close();
                }else{
                    swal({title:"Error!!",
                        text:"Se corregira en los proximos minutos",
                        className: "swal-text",
                        button: false
                        },
                            );
                }
            
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
        }
        });
        });




        $(this).on('click',"#Hamburguesas #Ver",function (){
            $("#GuardarHamburguesa").hide();
            var id=$(this).parents('tr').find('td').first().text();
            var ingredientes=$(this).parents('tr').find('td').last().text();
            //alert(id);
            var values={id:id};
            $.ajax({
                    url: "../../Model/ajax/HamburguesasConsulta.php",
                    type: "post",
                    data: values ,
                    success: function (datos) {
                       var resultado=JSON.parse(datos); 
                        console.log(resultado);
                        var longitud=Object.keys(resultado).length;
                        var ingredienteString=""; 
                        console.log(datos);
                        if(resultado[0]=="1"){
                            $("#Hamburguesas input,#HamburguesasModal textarea").val("");
                            $("#inputId").val(resultado[1]);
                            $("#idNombre").val(resultado[2]);
                            $("#idPrecio").val(resultado[3]);
                            $("#inputIngredientes").val(ingredientes);
                            $("#inputDescripcion").val(resultado[4]);
                            $("#inputImagen").attr("src","http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/papachoshamburguers/"+resultado[5]);                            
                            $("#inputLogo").attr("src","http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/logotipos/"+resultado[6]);                            
                            $("#inputIdoferta").val(resultado[7]);
                            $("#inputIdtplato").val(resultado[8]);
                       
                            popupHamburguesa();
    
                        }else{
                            swal({title:"Error!!",
                                text:"Se corregira en los proximos minutos",
                                className: "swal-text",
                                button: false
                                },
                                    );
                        }
                    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                }
            });
    
        });
       
        $(this).on('click',"#Hamburguesas #Agregar",function (){
            $("#GuardarHamburguesa").show();
            $("#inputId,#idNombre,#idPrecio,#inputIngredientes,#inputDescripcion,#inputIdoferta,#inputIdtplato").val("");
            $("#HamburguesasModal img").attr('src',"");
            $("#inputImagen").attr("src","http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/papachoshamburguers/Hdefecto.png");                            
            $("#inputLogo").attr("src","http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/papachoshamburguers/Hdefecto.png");    
            popupHamburguesa();
            $("#inputIdtplato").val("PT000000");
            var id=$('#ID_ULTIMO').attr('data-id');
            var ceros="";
           
            var numero = parseInt(id.substr(2, id.length));
            var Max=6;
            var NumeroT=(numero+1).toString().length;
            var indexT=Max-NumeroT;
            for (var index = 0; index < (indexT); index++) {
                ceros=ceros+"0";
            }
            var codigoActual=ceros+""+(numero+1);
            $("#inputId").val("PL"+codigoActual);
        });
        
        $(this).on('click'," #GuardarHamburguesa",function (){
           
            var id=$("#inputId").val();
            var nombre=$("#idNombre").val();
            var precio=$("#idPrecio").val();
            var ingredientes=$("#inputIngredientes").val();
            var descripcion=$("#inputDescripcion").val();
            var imagen=document.getElementById('Imagen-Hamburguesa').files[0].name;                            
            var logo=document.getElementById('Logo-Hamburguesa').files[0].name;                            
            var idoferta= $("#inputIdoferta").val();
            var idplato=$("#inputIdtplato").val();


            //estado
            if(id!=""&&nombre!=""&&precio!=""&&ingredientes!=""&&descripcion!=""&&imagen!=""&&logo!=""&&idplato!=""){
                var values={id:id,nombre:nombre,precio:precio,ingredientes:ingredientes,descripcion:descripcion,imagen:imagen,logo:logo,idoferta:idoferta,idplato:idplato};
                
                var fileImgHamburguesa = document.getElementById('Imagen-Hamburguesa').files[0];
                var image_name_hamburguesa = document.getElementById('Imagen-Hamburguesa').files[0].name;
                
                var fileLogoHamburguesa = document.getElementById('Logo-Hamburguesa').files[0];
                var image_logo_hamburguesa = document.getElementById('Logo-Hamburguesa').files[0].name;
                
                SubirImagenHamburguesa(image_name_hamburguesa, fileImgHamburguesa);
                SubirLogoHamburguesa(image_logo_hamburguesa, fileLogoHamburguesa);

                $.ajax({
                        url: "../../Model/ajax/HamburguesasAgregar.php",
                        type: "post",
                        data: values ,
                        success: function (datos) {
                            
                          
                            if(datos=="1"){
                                $.magnificPopup.close();
                                swal({title:"Felicitaciones!!",
                                text:"Hamburguesa agregada con exito",
                                className: "swal-text",
                                button: false
                                },); 
                               
        
                            }else{
                                swal({title:"Error!!",
                                    text:"Se corregira en los proximos minutos",
                                    className: "swal-text",
                                    button: false
                                    },
                                        );
                            }
                        
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.log(textStatus, errorThrown);
                    }
                });
            }else{
                swal({title:"Alerta!!",
                text:"Faltan rellenar campos",
                className: "swal-text",
                button: false
               },
               );
            }
           
    
        });
       
     

        $(this).on('click',"#Hamburguesas #Eliminar",function (){
            var id=$(this).parents('tr').find('td').first().text();
            //alert(id);
         
            swal({
                title:"¡Desea eliminar la hamburguesa!",
                buttons: {
                  cancel: "Cancelar",
                  confirm: "Aceptar",
                },
              }).then((value) => {
                switch (value) {
               
                  case true:
                    HamburguesasEliminar(id);
                   // alert("Acepto");
                    break;
               
                  case false:
                  //alert("Cancelo");
                    break;
                }
              });

            
    
        });
        // 
        $(this).on('click',"#Hamburguesas #Actualizar",function (){
          
            location.reload();
    
        });
        
        $(this).on("click",'#Adicionar',function(){
            var id=$(this).parents('tr').find('td').first().text();
            $("#input-checkbox").val(id);//agregar id al boton no borrar
           // $("input[type=checkbox]").prop('checked', false);
            var values={id:id};
           
            
            $.ajax({
                url: "../../Model/ajax/IngredienteAdicionar.php",
                data: values ,
                type: "post",
                success: function (datos) {
                   var resultado=JSON.parse(datos); 
                    console.log(resultado);
                    var longitud=Object.keys(resultado).length;
                    var contenidoIngrediente=resultado[longitud-1].length;
                    var ingredienteString=""; 
                    console.log(datos);
                    if(resultado[0]['id'].length!=""){
                       
                        var ingrediente="";
                    for (var index = 0; index < longitud; index=index+4) {
                        ingrediente +='<div class="row">';
                        ingrediente += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                        ingrediente += '<input type="checkbox" id="'+ resultado[index]['id']+'" />';
                        ingrediente += '</div>';
                        ingrediente += '<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">';
                        ingrediente +='<span for="inputnombre" class="nombrespan">'+ resultado[index+1]['nombre']+'</span>';
                        ingrediente += '<span for="inputprecio" class="preciospan">s/'+resultado[index+2]['precio']+'</span>';
                        ingrediente += '</div>';
                        ingrediente += '</div>';
                    }
                   var html=ingrediente;
                        $("#AdherirCheckedIngredientes").html(html);

                        for (var pos = 0; pos < contenidoIngrediente; pos=pos+1) {
                            for (var index = 0; index < longitud; index=index+4) {
                                if(resultado[longitud-1][pos]['idingrediente']==resultado[index]['id']&&resultado[longitud-1][pos]['idplato']==id){
                                    //$("#"+resultado[longitud-1][pos]['idpb'] +" :checkbox").attr('checked', true);
                                    //$("#"+resultado[longitud-1][pos]['idpb'] +"input[type=checkbox]").prop('checked', true);
                                    document.getElementById(resultado[longitud-1][pos]['idingrediente']).checked=true;
                                    break;
                                }else{
                                 
                                }
                           
                        }
                        } 
                    }else{
                        swal({title:"Error!!",
                            text:"Se corregira en los proximos minutos",
                            className: "swal-text",
                            button: false
                            },
                                );
                    }
                
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
            }
        });

        $.ajax({
            url: "../../Model/ajax/CaracteristicaAdicionar.php",
            type: "post",
            data: values ,
            success: function (datos) {
               var resultado=JSON.parse(datos); 
                console.log(resultado);
                var longitud=Object.keys(resultado).length;
                var ingredienteString=""; 
                console.log(datos);
                var contenidoCaracteristica=resultado[longitud-1].length;
                var cont=0;
                if(resultado[0]['id'].length!=""){
                    
                     var caracteristica="";
                 for (var index = 0; index < longitud; index=index+4) {
                    if(!(id==resultado[index]['id'])){
                        caracteristica +='<div class="row">';
                        caracteristica += '<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">';
                        caracteristica += '<input type="checkbox" class="'+ resultado[index]['id']+'" id="'+ resultado[index]['id']+'" />';
                        caracteristica += '</div>';
                        caracteristica += '<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">';
                        caracteristica +='<span for="inputnombre" class="nombrespan">'+ resultado[index+1]['nombre']+'</span>';
                        caracteristica += '<span for="inputprecio" class="preciospan">s/'+resultado[index+2]['precio']+'</span>';
                        caracteristica += '</div>';
                        caracteristica += '</div>';
                    }
                 }

                 var html=caracteristica;
                 $("#AdherirCheckedCaracteristica").html(html);
                for (var pos = 0; pos < contenidoCaracteristica; pos=pos+1) {

                    for (var index = 0; index < longitud; index=index+4) {
                        
                        if(resultado[longitud-1][pos]['idpb']==resultado[index]['id']&&resultado[longitud-1][pos]['idplato']==id){
                            //$("#"+resultado[longitud-1][pos]['idpb'] +" :checkbox").attr('checked', true);
                            //$("#"+resultado[longitud-1][pos]['idpb'] +"input[type=checkbox]").prop('checked', true);
                            document.getElementById(resultado[longitud-1][pos]['idpb']).checked=true;
                            break;
                        }else{
                         
                        }
                   
                }
                }          
                
                popupAdherir();
                }else{
                    swal({title:"Error!!",
                        text:"Se corregira en los proximos minutos",
                        className: "swal-text",
                        button: false
                        },
                            );
                }
            
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
        }
    });



        });
 
        $(this).on('click',"input[type='checkbox']",function(){
            var idHamburguesa=$("#input-checkbox").val();
           //alert(idHamburguesa);
            var id=$(this).attr('id');
            if($(this).is(':checked') === true){
                var documento="";
                if(id.substring(0,1)=="I"){
                    documento="AsignarHamburguesaIngrediente.php";
                }
                if(id.substring(0,2)=="PL"){
                    documento="AsignarHamburguesaPlato.php";
                }
                 if(id.substring(0,1)=="B"){
                    documento="AsignarHamburguesaBebida.php";
                }
                var values={id:id,idHamburguesa:idHamburguesa};
                $.ajax({
                    url: "../../Model/ajax/"+documento,
                    type: "post",
                    data: values ,
                    success: function (datos) {
   
                        if(datos=="1"){
                            swal({title:"Felicitaciones!!",
                            text:"Asignado con exito",
                            className: "swal-text",
                            button: false
                            },); 
    
                        }else{
                            swal({title:"Error!!",
                                text:"Se corregira en los proximos minutos",
                                className: "swal-text",
                                button: false
                                },
                                    );
                        }
                    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                }
            });
            }
            else{
                var documento="";
                if(id.substring(0,1)=="I"){
                    documento="EliminarHamburguesaIngrediente.php";
                }
                if(id.substring(0,2)=="PL"){
                    documento="EliminarHamburguesaPlato.php";
                }
                 if(id.substring(0,1)=="B"){
                    documento="EliminarHamburguesaBebida.php";
                }
                var values={id:id,idHamburguesa:idHamburguesa};
                $.ajax({
                    url: "../../Model/ajax/"+documento,
                    type: "post",
                    data: values ,
                    success: function (datos) {
   
                        if(datos=="1"){
                            swal({title:"Felicitaciones!!",
                            text:"Eliminado con exito",
                            className: "swal-text",
                            button: false
                            },); 
    
                        }else{
                            swal({title:"Error!!",
                                text:"Se corregira en los proximos minutos",
                                className: "swal-text",
                                button: false
                                },
                                    );
                        }
                    
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                }
            });
            }
            



         
        });



        imagenHamburguesaImg();
        imagenHamburguesaLogo();       
        
});
function popupPedido() {
      $.magnificPopup.open({
          items: {
              src: '#PedidosModal'
          },
          focus: '#inputId',//QUE SE ACENTUE EN ESTE ID
          removalDelay: 200,//tiempo de demora 
          callbacks: {
              beforeOpen: function (e) {
                  var Animation = "mfp-fade";//animacion
                  this.st.mainClass = Animation;
                  this.contentContainer.addClass(Animation);
              },
              afterClose: function (e) {
              }
          },
          type: 'inline'//en una sola linea
      });
  }
  
  function popupHamburguesa() {
    $.magnificPopup.open({
        items: {
            src: '#HamburguesaModal'
        },
        focus: '#inputId',//QUE SE ACENTUE EN ESTE ID
        removalDelay: 200,//tiempo de demora 
        callbacks: {
            beforeOpen: function (e) {
                var Animation = "mfp-fade";//animacion
                this.st.mainClass = Animation;
                this.contentContainer.addClass(Animation);
            },
            afterClose: function (e) {
            }
        },
        type: 'inline'//en una sola linea
    });
}
function popupAdherir() {
      $.magnificPopup.open({
          items: {
              src: '#AdherirModal'
          },
          focus: '#idIngrediente',//QUE SE ACENTUE EN ESTE ID
          removalDelay: 200,//tiempo de demora 
          callbacks: {
              beforeOpen: function (e) {
                  var Animation = "mfp-fade";//animacion
                  this.st.mainClass = Animation;
                  this.contentContainer.addClass(Animation);
              },
              afterClose: function (e) {
              }
          },
          type: 'inline'//en una sola linea
      });
  }
function SubirImagenHamburguesa(image_name_hamburguesa, fileImgHamburguesa) {
    var dataP = new FormData();
    dataP.append("imgPrincipal", fileImgHamburguesa);
    dataP.append("txt_img_name", image_name_hamburguesa);   
    $.ajax({
        url: '../../Model/ajax/HamburguesasGuardarImagen.php',
        type: "POST",
        data: dataP,
        contentType: false,
        processData: false,
        dataType: false,
        cache: false,
        success: function (data) {

        },
        error: function (data, errorThrown) { }
    });
}
function SubirLogoHamburguesa(image_logo_hamburguesa, fileLogoHamburguesa) {
    var dataP = new FormData();
    dataP.append("imgPrincipal", fileLogoHamburguesa);
    dataP.append("txt_img_name", image_logo_hamburguesa);   
    $.ajax({
        url: '../../Model/ajax/HamburguesasGuardarlogo.php',
        type: "POST",
        data: dataP,
        contentType: false,
        processData: false,
        dataType: false,
        cache: false,
        success: function (data) {

        },
        error: function (data, errorThrown) { }
    });
}

function imagenHamburguesaImg() {
    var _URL = window.URL || window.webkitURL;
    $('#Imagen-Hamburguesa').change(function () {
        var sizeByte = this.files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        var fileName = this.files[0].name;
        var extendFile = '.' + fileName.split('.').pop();

        if (extendFile != '.jpg' && extendFile != '.JPG'&& extendFile != '.PNG'&& extendFile != '.png') {

        } else {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function () {
                };
                img.onerror = function () {

                };
                img.src = _URL.createObjectURL(file);
                $('#inputImagen').attr('src', img.src);
            }
        }
    });
}
function imagenHamburguesaLogo() {
    var _URL = window.URL || window.webkitURL;
    $('#Logo-Hamburguesa').change(function () {
        var sizeByte = this.files[0].size;
        var siezekiloByte = parseInt(sizeByte / 1024);
        var fileName = this.files[0].name;
        var extendFile = '.' + fileName.split('.').pop();

        if (extendFile != '.jpg' && extendFile != '.JPG'&& extendFile != '.PNG'&& extendFile != '.png') {

        } else {
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                img.onload = function () {
                };
                img.onerror = function () {

                };
                img.src = _URL.createObjectURL(file);
                $('#inputLogo').attr('src', img.src);
            }
        }
    });
}


function HamburguesasEliminar(id){
    var values={id:id};
$.ajax({
        url: "../../Model/ajax/HamburguesasEliminar.php",
        type: "post",
        data: values ,
        success: function (datos) {
            if(datos=="1"){
              
                swal({title:"Felicitaciones!!",
                text:"Hamburguesa eliminada con exito",
                className: "swal-text",
                button: false
                },); 
           
              //  popupHamburguesa();

            }else{
                swal({title:"Error!!",
                    text:"Se corregira en los proximos minutos",
                    className: "swal-text",
                    button: false
                    },
                        );
            }
        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
    }
});
}