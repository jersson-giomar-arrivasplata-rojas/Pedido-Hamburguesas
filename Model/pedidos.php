<?php
require_once ('connection/connection.php');
class pedidos{
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
	public static function QueryPedidoArray(){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$pedidoArray=mysqli_query($conectar, "SELECT*FROM restauranteintegrador.pedido;");//Hamburguesas
		mysqli_close($conectar);		
		return $pedidoArray;
	}
	public static function QueryPedidoIDArray($id){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$pedidoArray=mysqli_query($conectar, "SELECT*FROM restauranteintegrador.pedido WHERE id='".$id."';");//Hamburguesas
		mysqli_close($conectar);		
		return $pedidoArray;
	}
	public static function QueryPedidoAceptar($id){
		$conectar=connection::Conectar();
		try{
			mysqli_set_charset( $conectar, 'utf8');	
		mysqli_query($conectar, "UPDATE restauranteintegrador.pedido SET restauranteintegrador.pedido.idenviado=1 WHERE id='".$id."';");//Hamburguesas
		mysqli_close($conectar);		
		return true;
		}catch(Exception $e)
		{
			return ($e->getMessage());
		}
	}
	public static function QueryPedidoRecibido($id){
		$conectar=connection::Conectar();
		try{
			mysqli_set_charset( $conectar, 'utf8');	
		mysqli_query($conectar, "UPDATE restauranteintegrador.pedido SET restauranteintegrador.pedido.idrecibido=1 ,  restauranteintegrador.pedido.idenviado=1 WHERE id='".$id."';");//Hamburguesas
		mysqli_close($conectar);		
		return true;
		}catch(Exception $e)
		{
			return ($e->getMessage());
		}
	}
	public static function QueryPedidoCancelar($id){
		$conectar=connection::Conectar();
		try{
			mysqli_set_charset( $conectar, 'utf8');	
			mysqli_query($conectar, "UPDATE restauranteintegrador.pedido SET restauranteintegrador.pedido.idrecibido=0 , restauranteintegrador.pedido.idenviado=0  WHERE id='".$id."';");//Hamburguesas
			mysqli_close($conectar);		
			return true;
		}catch(Exception $e)
		{
			return ($e->getMessage());
		}
		
	}
}


?>