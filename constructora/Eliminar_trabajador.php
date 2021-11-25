<?php 

session_start();
 include ("includes/conexion.php");

 $rut = $_GET['id'];
 $delete = "DELETE FROM Trabajador WHERE Rut = '$rut'";
 $query = $conexion->query($delete);

 if ($query==1){
     header("Location: listar_trabajadores.php?error=eliminado&contenido= El trabajador se eliminó exitosamente");
 }
 else{
     header("Location: listar_trabajadores.php?error=noeliminado&contenido=No se eliminó nada");
 }

?>