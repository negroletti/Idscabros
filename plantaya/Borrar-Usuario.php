<?php 

 include ("includes/conexion2.php");

 $id = $_GET['id'];
 $delete = "DELETE FROM Usuario WHERE US_Cod =$id";
 $query = mysqli_query($conexion,$delete);

 if ($query==1){
    header("Location: Listar-Usuarios.php?error=vacio&contenido= El usuario se eliminó exitosamente");
 }
 else{
    header("Location: Listar-Usuarios.php?error=incompleta&contenido=No se eliminó el usuario");
 }

?>