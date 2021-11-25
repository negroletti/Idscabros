<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicacion Plantilla</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./Ubicacion.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
</head>
<?php 
include 'conexion.php';

ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
?>
<?php
include 'requires/nav.php'; 
include 'mail.php';
    $correo_usuario=$_GET["id"];
    $asunto= $_GET["asunto"];
    $mensaje= $_GET["mensaje"];
    $correo= $_GET["correo"];
    $contenido =": ".$mensaje. "\nPor favor contactame: ".$correo;
    
        sendMail($correo_usuario,$asunto,$contenido); 
    

 include 'includes/footer.php';?>

 <div class="container col-lg-6 col-lg-offset-3 shadow-sm p-3 mb-5 bg-white rounded">
            <div class="panel panel-default">   
                <div class="panel-feading" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">
                    <div class="panel-title">
                        <center><h3 style="color: white;">¡El Email ha sido enviado correctamente!</h3></center>
                    </div>
                </div>
</body>
</html>