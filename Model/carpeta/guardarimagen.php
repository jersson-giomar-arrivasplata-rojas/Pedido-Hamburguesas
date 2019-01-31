<?php
class guardarimagen{

    private $guardarfoto;
    private $guardarlogo;

    public function __construct($imagen,$logo){
        try
		{

		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }



    public static function guardar_imagen($imagen,$name) 
    { 
   
   
        $ruta="http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/papachoshamburguers/".$name;//ruta carpeta donde queremos copiar las imágenes 
        $uploadfile_temporal=$_FILES[$imagen][$name]; 
        $uploadfile_nombre=$ruta.$_FILES[$imagen][$name]; 
        
        if (!(is_uploaded_file($uploadfile_temporal)) )
        { 
            move_uploaded_file($uploadfile_temporal,$uploadfile_nombre); 
            return true; 
        } 
        else 
        { 
            
        return false; 
        }  
        
    }
    public static function guardar_logo($logo,$name) 
    { 
   
   
        $ruta="http://localhost:8080/MVC/Back-Front-End-Hamburguesas/assets/images/logotipos/".$name;//ruta carpeta donde queremos copiar las imágenes 
        $uploadfile_temporal=$_FILES[$logo][$name]; 
        $uploadfile_nombre=$ruta.$_FILES[$logo][$name]; 
        
        if (!(is_uploaded_file($uploadfile_temporal))) 
        { 
            move_uploaded_file($uploadfile_temporal,$uploadfile_nombre); 
            return true; 
        } 
        else 
        { 
            
        return false; 
        }  
        
    }
   
}
?>