<?php
session_start();
include ("includes/conexion.php");
$id = $_GET['id'];

$delete = "DELETE FROM Esta WHERE Id_Inventario='$id'";
$query = $conexion->query($delete);
if ($query==1){
    $delete = "DELETE FROM Inventario WHERE Id_Inventario='$id'";
    $conexion->query($delete);
    header("Location: Inventario.php?error=eliminado&contenido= El inventario se ha eliminado con éxito, recuerde modificar el proyecto actual para vincular nuevo inventario");
}else{
    header("Location: Inventario.php?error=noeliminado&contenido=No se eliminó nada");
}
?>