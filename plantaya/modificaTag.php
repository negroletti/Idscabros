<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('includes/conexion.php');

    $error=false;
    $errorTag= '';
        if(empty($_POST['nombreTag2'])){
            $errorTag= "*Por favor ingresa un nombre.";
            $error=true;
        }
        else if (strlen($_POST['nombreTag2'])>60){
            $errorTag= "*El nombre ingresado es demasiado largo.";
            $error=true;
        }
        else if(ctype_space($_POST['nombreTag2'])){
            $errorTag="*Ingrese un nombre válido.";
            $error=true;
        }
        if(!$error)
        {   
            echo "llego a ingresar";
            $TG_Cod = $_GET['TG_Cod'];
            $Tag=filter_var(strtolower($_GET['nombreTag2']),FILTER_SANITIZE_STRING);
            $sql= "UPDATE Tags SET TG_Tag='$Tag' where TG_Cod=='TG_Cod'";
            $resultado3=mysqli_query($conexion,$sql);
        }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Categoría</title>
    <script languaje="JavaScript">
    location.href='tags.php';
    </script>
</head>
<body>

</body>
</html>
