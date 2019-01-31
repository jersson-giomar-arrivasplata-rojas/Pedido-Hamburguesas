<?php
require_once ('connection/connection.php');
class facturas{
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
	

}


?>