<?php


include ("includes/conexion.php");
$id = $_GET['id'];
$delete = "DELETE FROM Cuadrilla Where Id_Cuadrilla='$id'";
$query = $conexion->query($delete);
if ($query==1){
    header("Location: lista-cuadrillas.php?error=eliminado&contenido= La cuadrilla se ha eliminado con éxito");
}else{
    $question ="SELECT * FROM Trabajador WHERE Id_Cuadrilla ='$id'";
    $query2=$conexion->query($question);
    if($query2==1){
            header("Location: lista-cuadrillas.php?error=trab&contenido= ¡NO PUEDE ELIMINAR UNA CUADRILLA CON TRABAJADORES ASIGNADOS!");
    }else{
        header("Location: lista-cuadrillas.php?error=trab&contenido= No se pudo borrar la cuadrilla");
    }
}
?>
