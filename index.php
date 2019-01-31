<?php

$componentes_url=parse_url($_SERVER['REQUEST_URI']);//trata las url
//echo $componentes_url['path'];
//LOCALHOST/BLOG --> //RUTA /USUARIO/ONE
$ruta=$componentes_url['path'];
$partes_ruta=explode('/',$ruta);//localhsot/ blog/usuarios / javadocve como array 0 1 2 
$partes_ruta=array_filter($partes_ruta);//indice vacio eliminado
$partes_ruta=array_slice($partes_ruta,1);//desde la 2da 

$ruta_elegida='Vista/404.php';


if(count($partes_ruta)==2){
    switch($partes_ruta[1]){
    case'login.php':
    $ruta_elegida='View/login.php';
    break;
    }
}else if(count($partes_ruta)==1){
    switch($partes_ruta[0]){
        case'login':
        $ruta_elegida='View/login.php';
        break;
        case'login.php?logout':
        $ruta_elegida='View/login.php';
        break;
        case'logout.php':
        $ruta_elegida='View/login.php';
        break;
        case'index.php':
        $ruta_elegida='View/home.php';
        break;
        case'login.php':
        $ruta_elegida='View/login.php';
        break;
 }
} else if(count($partes_ruta)==3){
    switch($partes_ruta[2]){
        case'home':
        $ruta_elegida='View/admin/home.php';
        break;
        case'hamburguesas':
        $ruta_elegida='View/hamburguesas.php';
        break;
        case'pedidos':
        $ruta_elegida='View/pedidos.php';
        break;
        case'facturas':
        $ruta_elegida='View/facturas.php';
        break;    
        case'home':
        $ruta_elegida='View/admin/home.php';
        break;  
 }

}

 //echo($ruta_elegida);
include_once $ruta_elegida;

?>
