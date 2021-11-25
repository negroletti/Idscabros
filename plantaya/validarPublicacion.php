<?php 
    
    $errortitulo="";
    $error=false;
    $errorimagen= '';
    $errordescripcion='';
    $errorCategoria='';
       


    if(isset($_POST['submit'])){
        if(empty($_POST['tituloPublicacion'])){
            $errortitulo= "*Por favor ingresa un título.";
            $error=true;
        }
        else if (strlen($_POST['tituloPublicacion'])>200){
            $errortitulo= "*El título ingresado es demasiado largo.";
            $error=true;
        }
        else if(ctype_space($_POST['tituloPublicacion'])){
            $errortitulo="*Ingrese un título válido.";
            $error=true;
        }
        if(empty($_POST['categoria'])){
            $errorCategoria= "*Por favor ingresa una categoría.";
            $error=true;
        }
        if(!empty($_POST['deseaDesc'])){
            if(empty($_POST['descripcionPublicacion'])){
                $errordescripcion= "*Por favor ingrese una descripción";
                $error=true;
            }
            else if(strlen($_POST['descripcionPublicacion'])>200){
                $errordescripcion="*La descripción es demasiado larga.";
                $error=true;
            }
            else if(ctype_space($_POST['descripcionPublicacion'])){
                $errordescripcion="*Ingrese una descripción válida.";
                $error=true;
            }
        }
        if(!empty($_POST['deseaFoto'])){        
            $num_archivos=count($_FILES['archivo']['name']);
            if($num_archivos>4){
                $errorimagen="Solo puede ingresar hasta 4 imagenes.";
                $error=true;
            }else{
                foreach ($_FILES['archivo']['tmp_name']as $key => $tmp_name){
                    if ($_FILES['archivo']['name'][$key]){
                        $filename = $_FILES['archivo']['name'][$key];
                        $temporal = $_FILES['archivo']['tmp_name'][$key];
                        $tipo_archivo=array('jpg','png','jpeg');
                        $array_nombre = explode('.',$filename);
                        $cuenta_arr_nombre = count($array_nombre);
                        $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
        
                        if (filesize($temporal)>8388608){
                            $errorimagen="*Debe ingresar una imagen de máximo 8 mb.";
                            $error=true;
                        }
                        else if(!in_array($extension,$tipo_archivo)){
                            $errorimagen="*Debe ingresar una imagen en un formato válido. (jpg, jpeg, png)";
                            $error=true;
                        }
                    }
                }
            }
        }
        if(!$error)
        {   
            include 'ingresarPublicacion.php';
        }
    }
?>
