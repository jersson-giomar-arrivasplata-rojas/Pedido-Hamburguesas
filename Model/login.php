<?php
require_once ('connection/connection.php');
class login{
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
	public static function Identificar($user_name){
		$conectar=connection::Conectar();
		mysqli_set_charset( $conectar, 'utf8');	
		$buscar=mysqli_query($conectar,"SELECT dni,correo,password,idestado FROM user 
        	WHERE (correo='".$user_name."' OR dni='".$user_name."') AND idestado=1 ;" );
		mysqli_close($conectar);
		return $buscar;
	}


}


?>