<?php 
    $conexion = new mysqli('localhost','root',' ', 'proyectogps'); 

    if($conexion->connect_errno) die('¡NO TE CONECTASTE!');
?>