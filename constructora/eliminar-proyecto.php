<?php
session_start();
include ("includes/conexion.php");

$codigo = $_GET['id'];
$eliminar = "DELETE FROM Proyecto WHERE Id_Proyecto = '$codigo'";
$resultado = $conexion->query($eliminar);

if($resultado == 1)
    header("Location: lista_proyectos.php?error=correcto&contenido=Proyecto Eliminado con éxito");

?>