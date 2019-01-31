<?php
require_once ('connection/connection.php');
class hamburguesas{
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
	public static function QueryHamburguesasArray(){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$hamburguesasArray=mysqli_query($conectar, "SELECT*FROM restauranteintegrador.plato WHERE restauranteintegrador.plato.idestado=1 ;");//Hamburguesas
		mysqli_close($conectar);		
		return $hamburguesasArray;
	}
	public static function QueryHamburguesasIDArray($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$hamburguesasArray=mysqli_query($conectar, "SELECT*FROM restauranteintegrador.plato WHERE id='".$id."';");//Hamburguesas
		mysqli_close($conectar);		
		return $hamburguesasArray;
	}
	public static function QueryHamburguesaDelete($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$hamburguesasArray=mysqli_query($conectar, "UPDATE restauranteintegrador.plato SET restauranteintegrador.plato.idestado=0  WHERE id='".$id."';");//Hamburguesas
		mysqli_close($conectar);		
		return $hamburguesasArray;
	}
//incrementa id
	public static function QueryHamburguesaAgregar($id,$nombre,$precio,$ingredientes,$descripcion,$imagen,$logo,$idoferta,$idplato){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$today=getdate();
		$year=$today['year'];
		$mon=$today['mon'];
		$mday=$today['mday'];
		$hours=$today['hours'];
		$minutes=$today['minutes'];
		$seconds=$today['seconds'];
		$fecha=$year."-".$mon."-".$mday." ".$hours.":".$minutes.":".$seconds;
		$hamburguesasArray=mysqli_query($conectar, "INSERT INTO restauranteintegrador.plato (id, nombre, ingredientes, precio, descripcion, imagen, logo, idoferta, idtplato, idestado, userCrea, fechaCrea, userModifica, fechaModifica) 
		VALUES ( '".$id."', '".$nombre."', '".$ingredientes."', '".$precio."', '".$descripcion."', '".$imagen."', '".$logo."', '".$idoferta."', '".$idplato."',1, 'rojasjgar@gmail.com', '".$fecha."', null, null);");//Hamburguesas
		mysqli_close($conectar);		
		return $hamburguesasArray;
	}
}


?>