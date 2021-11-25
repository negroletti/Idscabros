<?php 
    $error=false;
    $errorTag= '';
    if(isset($_POST["submitTag"])){
        if(empty($_POST['nombreTag'])){
            $errorTag= "*Por favor ingresa un nombre.";
            $error=true;
        }
        else if (strlen($_POST['nombreTag'])>60){
            $errorTag= "*El nombre ingresado es demasiado largo.";
            $error=true;
        }
        else if(ctype_space($_POST['nombreTag'])){
            $errorTag="*Ingrese un nombre válido.";
            $error=true;
        }
        if(!$error)
        {   
            include 'ingresarTag.php';
        }
    }
?>