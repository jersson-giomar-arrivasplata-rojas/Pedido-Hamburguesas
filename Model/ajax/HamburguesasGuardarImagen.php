<?php

        $tmp_name = $_FILES['imgPrincipal']['tmp_name'];
        //si hemos enviado un directorio que existe realmente y hemos subido el archivo 
        $dir_subida = '../../assets/images/papachoshamburguers/';        
        if (is_dir($dir_subida) && is_uploaded_file($tmp_name))
        {
            $img_file = $_FILES['imgPrincipal']['name'];
            $img_type = $_FILES['imgPrincipal']['type'];
            echo 1;
            // Si se trata de una imagen   
            if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
     strpos($img_type, "jpg")) || strpos($img_type, "png")))
            {
                //¿Tenemos permisos para subir la imágen?
                echo 2;
                if (move_uploaded_file($tmp_name, $dir_subida . '/' . $img_file))
                {
                    return true;
                }
            }
        }

?>