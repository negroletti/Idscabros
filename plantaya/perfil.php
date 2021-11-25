<?php  
session_start();
require_once ('Conexion.php');
$conexion = ConectarBD();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">   
<link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>
<?php
require 'nav.php';
?>
      <link rel="stylesheet" href="estilos.css">

</head>

<header>
  <center><div class="titulo-perfil">
  <h1>PERFIL</h1>
  </div></center>
  <center><img src="usuario.png" width="245" height="280"  ></center>

</header>
<body>
  <center>
                   <div class="form-group">
                  <label for="usuario"> <h4><b>Rut del Usuario:</b><br>  </h4></label>
                  <input type="text" name="nombre" size="80">
                   </div>
                  <div class="form-group">
                  <label for="usuario"> <h4><b>Nombre del Usuario: </b> <br> </h4></label>
                  <input type="text" name="nombre" size="80">
                  </div>
                  <div class="form-group">
                  <label for="usuario"> <h4><b>Apellido del Usuario:</b><br> </h4> </label>
                  <input type="text" name="nombre" size="80">
                  </div>
                  <div class="form-group">
                  <label for="usuario"> <h4><b>Direccion del Usuario:</b> <br> </h4> </label>
                  <input type="text" name="nombre" size="80">
                  </div>
                  <div class="form-group">
                  <label for="usuario"> <h4><b>Corrreo del Usuario:</b> <br> </h4> </label>
                  <input type="text" name="nombre" size="80">
                  </div>
                  <div class="form-group">
                  <label for="usuario"> <h4><b>Puntuacion del Usuario:</b> <br> </h4></label>
                  <input type="text" name="nombre" size="80">
                  </div>
</center>
                  
</body>




      <div class="footer">
        <center>
  Copyright © 2021 
  <img src="imgPlantaYa.png" width="100" height="90">
</center>

</div>