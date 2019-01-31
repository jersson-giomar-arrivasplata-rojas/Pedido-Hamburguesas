<?php
require_once ('connection/connection.php');
class caracteristicas{
    private $conectar;
    public function __construct(){
        try
		{
			$this->conectar = connection::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	public static function QueryCaracteristicasArray(){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$caracteristicasArray=mysqli_query($conectar,"SELECT id, nombre,precio
        FROM  restauranteintegrador.bebida WHERE restauranteintegrador.bebida.idestado=1
        union all
        SELECT  id, nombre,precio
        FROM  restauranteintegrador.plato  WHERE restauranteintegrador.plato.idestado=1;");	
		mysqli_close($conectar);		
		return $caracteristicasArray;
	}
	public static function QueryCaracteristicaPlatoArray($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$caracteristicasArray=mysqli_query($conectar,"SELECT restauranteintegrador.platoadherir.idpb,restauranteintegrador.platoadherir.idplato  
        FROM  restauranteintegrador.platoadherir  WHERE restauranteintegrador.platoadherir.idestado=1 AND restauranteintegrador.platoadherir.idplato='".$id."' ;");	
		mysqli_close($conectar);		
		return $caracteristicasArray;
	}
	
}

?>