<?php
require_once ('connection/connection.php');
class plato{
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

	public static function QueryPlatoPlatoAsignar($id,$idHamburguesa){
		$conectar=connection::Conectar();
		try
		{
			$codigoMaxActual=mysqli_query($conectar,"SELECT restauranteintegrador.platoadherir.id from 
			restauranteintegrador.platoadherir 
			order by restauranteintegrador.platoadherir.id DESC limit 1;");
			$today=getdate();
			$year=$today['year'];
			$mon=$today['mon'];
			$mday=$today['mday'];
			$hours=$today['hours'];
			$minutes=$today['minutes'];
			$seconds=$today['seconds'];
			$fecha=$year."-".$mon."-".$mday." ".$hours.":".$minutes.":".$seconds;
			
			$row=mysqli_fetch_array($codigoMaxActual);
			$id_=$row['id'];
			$cantidad=(int)2;
			$ceros="";
	
				$numero = (int) substr($id_, 2, strlen($id_));
				for ($i=0; $i <(6-strlen($numero+1)) ; $i++) { 
					$ceros=$ceros."0";
				}
				$codigoActual="PA".$ceros."".($numero +1);
				
			 $ingredientesArray =mysqli_query($conectar,"INSERT INTO 
			 restauranteintegrador.platoadherir(id,idplato,idpb,idestado,userCrea,fechaCrea,userModifica,fechaModifica) 
				VALUES('". $codigoActual ."','". $idHamburguesa ."','". $id ."',1,'rojasjgar@gmail.com','". $fecha ."',null,null);");
	
			mysqli_close($conectar);		
			return true;
		}
		catch(Exception $e)
		{
			return ($e->getMessage());

		}
       
	}
	public static function QueryPlatoPlatoEliminar($id,$idHamburguesa){
		$conectar=connection::Conectar();
		try
		{
			mysqli_set_charset( $conectar, 'utf8');	
			mysqli_query($conectar,"DELETE FROM restauranteintegrador.platoingrediente WHERE idpb='".$id."' AND idplato='".$idHamburguesa."';");

			mysqli_close($conectar);		
			return true;
		}
		catch(Exception $e)
		{
			return ($e->getMessage());

		}
       
	}
}

?>