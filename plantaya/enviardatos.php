<?php
include 'requires/nav.php';
require "PHPMailer/Exception.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/SMTP.php";


    $destino= "plantaya.ubb@gmail.com";
    $nombre= $_POST["nombre"];
    $apellido= $_POST["apellido"];
    $correo= $_POST["correo"];
    $mensaje= $_POST["mensaje"];
    $contenido ="Dice: ".$mensaje. "\nPara contactarme mi correo personal es: ".$correo;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
$oMail= new PHPMailer();
$oMail->isSMTP();
$oMail->Host="smtp.gmail.com";
$oMail->Port=25;
$oMail->SMTPSecure="tls";
$oMail->SMTPAuth=true;
$oMail->Username="plantaya.ubb@gmail.com";
$oMail->Password="plantaomuere";
$oMail->setFrom($correo);
$oMail->addAddress($destino);
$oMail->Subject="PlantaYA!: Don $nombre $apellido se puso en contacto!";
$oMail->msgHTML($contenido);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
    

<div class="container col-lg-6 col-lg-offset-3 shadow-sm p-3 mb-5 bg-white rounded">
           <div class="panel panel-default">   
               <div class="panel-feading" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">
                   <div class="panel-title">
                       <center><h3 style="color: white;">¡El Email ha sido enviado correctamente!</h3></center>
                   </div>
               </div>
</body>
</html>
<?php
if(!$oMail->send())
  echo $oMail->ErrorInfo;
    
?>

