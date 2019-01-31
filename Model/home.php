<?php
require_once ('connection/connection.php');
require_once ('models/plato.php');
require_once ('models/ingrediente.php');
class home{
	private $conectar;
	public $codigoFinal;
	public $codigoMaxActual;
    public function __construct(){
        try
		{
			$this->conectar = connection::Conectar();
			//mysqli_close($conn);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }//PASAR PARAMETRO
	public static function QueryPlatoArray(){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$platoArray_=mysqli_query($conectar, "SELECT*FROM restauranteintegrador.plato where idtplato='PT000000' AND idestado=1;");//Hamburguesas
		mysqli_close($conectar);
		$platoArray =new plato();
		$platoArray->setPlatoArray($platoArray_);
		return $platoArray->getPlatoArray();
	}
	public static function QueryIngrediente($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$nombreArray_=mysqli_query($conectar,"SELECT  nombre,precio
   			FROM restauranteintegrador.platoingrediente
   			INNER JOIN restauranteintegrador.ingrediente
   			ON restauranteintegrador.platoingrediente.idingrediente = restauranteintegrador.ingrediente.id WHERE  idplato = '".$id."';");	
		mysqli_close($conectar);
		$nombreArray =new ingrediente();
		$nombreArray->setNombreArray($nombreArray_);
		return $nombreArray->getNombreArray();
	}
	public static function QueryAdherir($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$platoArray_=mysqli_query($conectar,"SELECT   nombre,precio
   			FROM restauranteintegrador.platoadherir
   			INNER JOIN restauranteintegrador.bebida
   			ON restauranteintegrador.platoadherir.idpb = restauranteintegrador.bebida.id WHERE  idplato = '".$id."'
            union all
			SELECT   nombre,precio
   			FROM restauranteintegrador.platoadherir
   			INNER JOIN restauranteintegrador.plato
   			ON restauranteintegrador.platoadherir.idpb = restauranteintegrador.plato.id WHERE  idplato = '".$id."';");	
		mysqli_close($conectar);
		$platoArray =new plato();
		$platoArray->setPlatoArray($platoArray_);
		return $platoArray->getPlatoArray();
	}//PEDIDO EN VEZ DE FACTURA
	public static function QueryEmpresaFactura($nombre,$ruc,$correo,$direccion,$celular,$mensaje,$hamburguesa,$TotalPrecio,$arregloIng,$arregloCaract){
		$conectar=connection::Conectar();
		//$date=new DateTime();
		try {
			mysqli_release_savepoint ($conectar,"mysqli"); 								
			mysqli_set_charset( $conectar, 'utf8');			
			$codigoMaxActual=mysqli_query($conectar,"SELECT restauranteintegrador.cli_empresa.id from 
		restauranteintegrador.cli_empresa 
		order by restauranteintegrador.cli_empresa.id DESC limit 1;");
		$codigoFinal=new home();	
		$codFin=$codigoFinal->CodigoGenerado($codigoMaxActual,'CE');
		$today=getdate();
		$year=$today['year'];
		$mon=$today['mon'];
		$mday=$today['mday'];
		$hours=$today['hours'];
		$minutes=$today['minutes'];
		$seconds=$today['seconds'];
		$fecha=$year."-".$mon."-".$mday." ".$hours.":".$minutes.":".$seconds;
			release_savepoint($conectar); 
			mysqli_query($conectar,"INSERT INTO 
		restauranteintegrador.cli_empresa(id,nombre,pais,direccion,correo,ruc,numcontacto,idestado,userCrea,fechaCrea,userModifica,fechaModifica)
		VALUES('CE".$codFin."','".$nombre."','PERÚ','".$direccion."','".$correo."','".$ruc."','".$celular."',1,'rojasjgar@gmail.com','".$fecha."',null,null);");	
		$codigoFinal->PedidoRealizado($TotalPrecio,$mensaje,$fecha,"CE".$codFin."",$arregloIng,$arregloCaract);
		mysqli_close($conectar);
			return true;
		}catch(Exception $e) {

  		return 'Message: ' .$e->getMessage();
		}
	}
	public static function QueryPersonaNaturalFactura($nombre,$apellido,$dni,$correo,$direccion,$celular,$mensaje,$hamburguesa,$TotalPrecio,$arregloIng,$arregloCaract){
		$conectar=connection::Conectar();
		//$date=new DateTime();
		try {
		mysqli_release_savepoint ($conectar,"mysqli"); 					
			mysqli_set_charset( $conectar, 'utf8');
			$codigoMaxActual=mysqli_query($conectar,"SELECT restauranteintegrador.cli_persona.id from 
		restauranteintegrador.cli_persona order by restauranteintegrador.cli_persona.id DESC limit 1;");
		//	$codigoFinal=home::CodigoGenerado($codigoMaxActual,'CP');
		$codigoFinal=new home();	
		$codFin=$codigoFinal->CodigoGenerado($codigoMaxActual,'CP');
		$today=getdate();
		$year=$today['year'];
		$mon=$today['mon'];
		$mday=$today['mday'];
		$hours=$today['hours'];
		$minutes=$today['minutes'];
		$seconds=$today['seconds'];
		$fecha=$year."-".$mon."-".$mday." ".$hours.":".$minutes.":".$seconds;
			mysqli_query($conectar,"INSERT INTO 
		restauranteintegrador.cli_persona(id,nombre,apellido,pais,direccion,correo,dni,numcontacto,idestado,userCrea,fechaCrea,userModifica,fechaModifica)
		VALUES('CP".$codFin."','".$nombre."','".$apellido."','PERÚ','".$direccion."','".$correo."','".$dni."','".$celular."',1,'rojasjgar@gmail.com','".$fecha."',null,null);");	//date
		$codigoFinal->PedidoRealizado($TotalPrecio,$mensaje,$fecha,"CP".$codFin."",$arregloIng,$arregloCaract);
		mysqli_close($conectar);
			return true;
		}catch(Exception $e) {
  			return 'Message: ' .$e->getMessage();
		}	
	}
	public static function QueryPersonaEmpresaFactura($nombre,$apellido,$ruc,$correo,$direccion,$celular,$mensaje,$hamburguesa,$TotalPrecio,$arregloIng,$arregloCaract){
		$conectar=connection::Conectar();
		try {
			mysqli_release_savepoint ($conectar,"mysqli"); 								
			mysqli_set_charset( $conectar, 'utf8');			
			$codigoMaxActual=mysqli_query($conectar,"SELECT restauranteintegrador.cli_empresapersona.id from 
		restauranteintegrador.cli_empresapersona order by restauranteintegrador.cli_empresapersona.id DESC limit 1;");
		$codigoFinal=new home();	
		$codFin=$codigoFinal->CodigoGenerado($codigoMaxActual,'CEP');
		$today=getdate();
		$year=$today['year'];
		$mon=$today['mon'];
		$mday=$today['mday'];
		$hours=$today['hours'];
		$minutes=$today['minutes'];
		$seconds=$today['seconds'];
		$fecha=$year."-".$mon."-".$mday." ".$hours.":".$minutes.":".$seconds;
			mysqli_query($conectar,"INSERT INTO 
		restauranteintegrador.cli_empresapersona(id,nombre,apellido,pais,direccion,correo,ruc,numcontacto,idestado,userCrea,fechaCrea,userModifica,fechaModifica)
		VALUES('CEP".$codFin."','".$nombre."','".$apellido."','PERÚ','".$direccion."','".$correo."','".$ruc."','".$celular."',1,'rojasjgar@gmail.com','".$fecha."',null,null);");	
		$codigoFinal->PedidoRealizado($TotalPrecio,$mensaje,$fecha,"CEP".$codFin."",$arregloIng,$arregloCaract);
		mysqli_close($conectar);
		return true;
		}catch(Exception $e) {
  			return 'Message: ' .$e->getMessage();
		}
	}
	public function PedidoRealizado($TotalPrecio,$mensaje,$fecha,$codFinUsuario,$arregloIng,$arregloCaract){//arreglar
		$connect=connection::Conectar();
		try {
			$codigoF=new home();
			mysqli_release_savepoint ($connect,"mysqli"); 								
			mysqli_set_charset( $connect, 'utf8');			
			$codMaxPedidoActual=mysqli_query($connect,"SELECT restauranteintegrador.pedido.id from 
		restauranteintegrador.pedido order by restauranteintegrador.pedido.id DESC limit 1;");
		$codPedidoFin=$codigoF->CodigoGenerado($codMaxPedidoActual,'P');	
			mysqli_query($connect,"INSERT INTO restauranteintegrador.pedido(id,precio,horalisto,mensaje,ingredientespedido,caracteristicaspedido,idenviado,idrecibido,idcliente,idrestaurante,idestado,userCrea,fechaCrea,userModifica,fechaModifica) 
			VALUES ('P".$codPedidoFin."',".(float)substr($TotalPrecio, 2, strlen($TotalPrecio)).",'".$fecha."','".$mensaje."','".implode(";", $arregloIng)."','".implode(";", $arregloCaract)."','0','0','".$codFinUsuario."','R0000000','1','rojasjgar@gmail.com','".$fecha."',null,null);");
		mysqli_close($connect);
		}catch(Exception $e) {
  			echo($e->getMessage()); 
		}
	}
	public function CodigoGenerado($codigoMaxActual,$tipo){
		$row=mysqli_fetch_array($codigoMaxActual);
		$id=$row['id'];
		$cantidad=(int)2;
		$ceros="";

		if($tipo=='CE'){//6
			$numero = (int) substr($id, 0, 1);
			for ($i=0; $i <(6-strlen($numero+1)) ; $i++) { 
				$ceros=$ceros."0";
			}
			$codigoActual=$ceros."".($numero +1);
		}else if($tipo=='CP'){//6
			
			$numero = (int) substr($id, 2, strlen($id));
			
			for ($i=0; $i <(6-strlen($numero+1)) ; $i++) { 
				$ceros=$ceros."0";
			}
			$codigoActual=$ceros."".($numero +1);
		}else if($tipo=='CEP'){//5
			$numero = (int) substr($id, 3, strlen($id));

			for ($i=0; $i <(5-strlen($numero+1)) ; $i++) { 
				$ceros=$ceros."0";
			}
			$codigoActual=$ceros."".($numero+1);
		}else if($tipo=='P'){//7
			$numero = (int) substr($id, 1, strlen($id));
			
			for ($i=0; $i <(7-strlen($numero+1)) ; $i++) { 
				$ceros=$ceros."0";
			}
			$codigoActual=$ceros."".($numero+1);
		}		
		return $codigoActual;
	}

}//error en 9 +1 if 

?>