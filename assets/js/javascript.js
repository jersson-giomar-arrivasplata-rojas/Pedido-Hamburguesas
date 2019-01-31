//$.noConflict();
var contador=parseInt(0);
jQuery(document).ready(function($) {
// Code that uses jQuery's $ can follow here.
    $('.dropdown-toggle').dropdown();
    
    $('.enviarPedido').on('click',function(){
        var Seleccion=$("#selectBox").val();
        if(Seleccion!=0){
            var tipoPago=$("#selectBoxFac").val();
            //Persona natural
            var nombre=$("#inputNombre").val();
            var apellido=$("#inputApellido").val();
            var dni=$("#inputDNI").val();
            var correo=$("#inputCorreo").val();
            var direccion=$("#inputDireccion").val();
            var celular=$("#inputCelular").val();
            var hamburguesa=Seleccion;
            var TotalPrecio=$("#precioFlotante").val();
            var mensaje=$("#txtMensaje").val();
            /*----------------------- */
            var ingrediente="";
            var arregloIng=[];
            //ingrediente
            for (var index = 0; index < parseInt($(".ingrediente-body-ul").attr('data-longitud')); index++) {
               
                var precIngrediente=$("#ING"+index).parents('li').find('span').first().text();
                var nomIngrediente=$("#ING"+index).parents('li').find('span').first().siblings('span').text();
                var cantidadIngrediente=parseInt($("#ING"+index).val());
                var UI=nomIngrediente+" "+ precIngrediente+" Cantidad:"+ cantidadIngrediente;//union ingredientes
                //ingrediente=ingrediente+UI;
                arregloIng[index]=UI;
            }
            /*----------------------- */
            var caracteristica="";
            var arregloCaract=[];
            //caracteristica
            for (var index = 0; index < parseInt($(".caracteristica-body-ul").attr('data-longitud')); index++) {
                var precCaracteristica=$("#CAR"+index).parents('li').find('span').first().text();
                var nomCaracteristica=$("#CAR"+index).parents('li').find('span').first().siblings('span').text();
                var cantidadCaracteristica=parseInt($("#CAR"+index).val());
                var UC=nomCaracteristica+" "+ precCaracteristica+" Cantidad:"+cantidadCaracteristica;//union caracteristicas
                //caracteristica=caracteristica+UC;
                arregloCaract[index]=UC;
            }
            console.log(arregloIng);
            //**************************************************//
            // 
            //
            if(tipoPago==0){//Persona natural
                if(nombre!=""||apellido!=""||dni!=""||correo!=""||direccion!=""||celular!=""){
                    var values={nombre:nombre,apellido:apellido,dni:dni,correo:correo,direccion:direccion,celular:celular,mensaje:mensaje,hamburguesa:hamburguesa,TotalPrecio:TotalPrecio,arregloIng:arregloIng,arregloCaract:arregloCaract};
                        $.ajax({
                                url: "Model/ajax/personaNaturalFactura.php",
                                type: "post",
                                data: values ,
                                success: function (datos) {
                                     if(datos=="true"){
                                          swal({title:"Felicitaciones!!",
                                            text:"Envio realizado con exito, espere su orden. Gracias :)",
                                            className: "swal-text",
                                            button: false
                                            },).then(
                                                function(){
                                                   // $("#selectBox").val('0');                                                    
                                                   $("#form input,#form textarea").val('');
                                                    location.reload();
                                                }
                                            );     
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
                    /*libreria */
                    swal({title:"Alerta!!",
                     text:"Faltan rellenar campos",
                     className: "swal-text",
                     button: false
                    },
                    );
                }
            }
            if(tipoPago==1){//Persona con empresa
                //Persona con empresa
            var ruc=$("#inputRUC").val();
            var direccion=$("#inputDireccionPE").val();
                if(nombre!=""||apellido!=""||ruc!=""||correo!=""||direccion!=""||celular!=""){
                    var values={nombre:nombre,apellido:apellido,ruc:ruc,correo:correo,direccion:direccion,celular:celular,mensaje:mensaje,hamburguesa:hamburguesa,TotalPrecio:TotalPrecio,arregloIng:arregloIng,arregloCaract:arregloCaract};
                        $.ajax({
                                url: "Model/ajax/personaEmpresaFactura.php",
                                type: "post",
                                data: values ,
                                success: function (datos) {
                                    if(datos=="true"){
                                        swal({title:"Felicitaciones!!",
                                            text:"Envio realizado con exito, espere su orden. Gracias :)",
                                            className: "swal-text",
                                            button: false
                                            },).then(
                                                function(){
                                                   // $("#selectBox").val('0');                                                    
                                                   $("#form input,#form textarea").val('');
                                                    location.reload();
                                                }
                                            );      
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
            }
            if(tipoPago==2){//empresa
             //Empresa
            var ruc=$("#inputRUC").val();
            var direccion=$("#inputDireccionE").val();
                 if(nombre!=""||ruc!=""||correo!=""||direccion!=""||celular!=""){
                    var values={nombre:nombre,ruc:ruc,correo:correo,direccion:direccion,celular:celular,mensaje:mensaje,hamburguesa:hamburguesa,TotalPrecio:TotalPrecio,arregloIng:arregloIng,arregloCaract:arregloCaract};
                        $.ajax({
                                url: "Model/ajax/EmpresaFactura.php",
                                type: "post",
                                data: values ,
                                success: function (datos) {
                                      if(datos=="true"){
                                         swal({title:"Felicitaciones!!",
                                            text:"Envio realizado con exito, espere su orden. Gracias :)",
                                            className: "swal-text",
                                            button: false
                                            },).then(
                                                function(){
                                                    //$("#selectBox").val('0');
                                                    $("#form input,#form textarea").val('');
                                                    location.reload();
                                                }
                                            );  
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
            }
        
        }else{
           // alert("Escoja una hamburguesa");
                swal({title:"Alerta!!",
                     text:"Escoja una hamburguesa",
                     className: "swal-text",
                     button: false
                    },
                    );
        }
        
    });

 

 });

function aumentarCantidad(posicion){
    //var valorActual=$(posicion).parents('span.input-group-addon').siblings('input').val();
   // if($(posicion).parents('span.input-group-addon').siblings('input').val()!=0){
        var valorActual=$(posicion).parents('div.spinner-input').siblings('input').attr('id');
        var valorFixed=$("#precioFlotante").val();
            valorFixed=valorFixed.substring(2, valorFixed.length);
            valorActual=parseFloat(valorActual)+parseFloat(valorFixed);
        var valorFinal="s/"+valorActual;
            $("#precioFlotante").val(valorFinal);
        var sumarValor=parseFloat($(posicion).parents('span.input-group-addon').siblings('input').val())+1;
            $(posicion).parents('span.input-group-addon').siblings('input').val(sumarValor);
  //  }
    
}
function disminuirCantidad(posicion){
   //var valorActual=$(posicion).parents('span.input-group-addon').siblings('input').val();
   if($(posicion).parents('span.input-group-addon').siblings('input').val()!=0){
        var valorActual=$(posicion).parents('div.spinner-input').siblings('input').attr('id');
        var valorFixed=$("#precioFlotante").val();
            valorFixed=valorFixed.substring(2, valorFixed.length);
            valorActual=parseFloat(valorFixed)-parseFloat(valorActual);
        var valorFinal="s/"+valorActual;
            $("#precioFlotante").val(valorFinal);
        var restarValor=parseFloat($(posicion).parents('span.input-group-addon').siblings('input').val())-1;
            $(posicion).parents('span.input-group-addon').siblings('input').val(restarValor);
    }

}