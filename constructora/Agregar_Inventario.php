<?php 

session_start();

include ("includes/conexion.php");
$insert = "INSERT INTO Inventario VALUES()";
$query = $conexion->query($insert);

if($query == 1){
    header("Location: Inventario.php?error=creado&contenido=Inventario agregado con exito, para visualizarlo vincule con algun proyecto");
}
?>