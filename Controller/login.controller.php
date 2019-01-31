<?php
require_once 'Model/login.php';

class loginController{
    private $model;
    public $error=array();
    public $message=array();

    public function __construct(){
        $this->model=new login();
        //se crea y se lee la sesion 
        session_start();
        if(isset($_GET["logout"])){//pide de url 
            $this->logout();//salir
        }else if(isset($_POST["login"])){//formulario ingresa
            $this->loginPostData();//ingresar despues de enviar los datos
        }
    }
    public function Login(){
        $login=$this->loggedIn();
        $error=$this->error;
        $message=$this->message;
       if($login==true){
            header("location: login/home");
           // require_once ('View/admin/login.php');
            //exit;
        }else{
            
            require_once ('View/admin/login.php');
        }
    } 
    public function logout(){
        $_SESSION = array();//arreglo se crea
        session_destroy();
        $this->message[]="Has sido desconectado.";
    }
    public function loggedIn(){
        if (isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] == 1) {
            return true;
        }else{
            return false;
        }
    }
    public function loginPostData(){
        if(empty($_POST["user_name"])){
            $this->error[]="Ususario esta vacio.";//$this->error (va junto)
        }else if (empty($_POST['user_password'])) {
            $this->error[] = "Contraseña esta vacia.";
        } elseif (!empty($_POST['user_name']) && !empty($_POST['user_password'])) {
            $login_check_result = login::Identificar($_POST['user_name']);          
        if ($login_check_result->num_rows == 1) {
            $result_row=$login_check_result->fetch_object();//traera como un objeto
            if($_POST['user_password']==$result_row->password){
                    $_SESSION['user_id'] = $result_row->dni;
    				$_SESSION['user_name'] = $result_row->correo;
                    $_SESSION['user_email'] = $result_row->correo;
                    $_SESSION['user_login_status'] = 1;
            }else{
                $this->error[] = "Usuario y/o contraseña no coinciden.";
                }
                }else{
                    $this->error[] = "Usuario y/o contraseña no coinciden.";
                }           
                }else{
                $this->error[] = "Problema de conexión de base de datos.";
            }
        } 
    }

?>

