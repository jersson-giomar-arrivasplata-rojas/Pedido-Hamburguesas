<?php 
 class connection{
    public static function Conectar(){
        require_once ('db.php');
        $conn=@mysqli_connect(HOST,USER,PASS,NAMEDB,PORT);
        if(!$conn){
            die("imposible conectarse: ".mysqli_error($con));
        }else if(@mysqli_connect_errno()){
            die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
        }
        return $conn;
    }
}
?>