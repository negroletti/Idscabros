<?php

session_start();
include("includes/conexion.php");
$rut = $_GET['id'];
$cua = $_GET['cua'];
if(isset($rut) && isset($cua)){
    $verificar = "SELECT * FROM Trabajador WHERE Id_Cuadrilla = $cua AND Rut=$rut AND Estado=2";
    $query = mysqli_query($conexion,$verificar);
    $rows = mysqli_fetch_array($query);
    $R = $rows['Rut'];
    if($R==$rut){
        header("Location:ver-cuadrilla.php?error=nocreado&contenido=Este trabajador ya es el jefe&id=$cua");
    }
    else{
        $select = "SELECT Rut FROM Trabajador WHERE Id_Cuadrilla = $cua AND Estado=2";
        $query = mysqli_query($conexion, $select);
        if($query == 1){
            $update = "UPDATE Trabajador SET Estado=1 WHERE Id_Cuadrilla='$cua' AND Estado=2";
            $query = mysqli_query($conexion,$update);
            $update="UPDATE Trabajador SET Estado=2 WHERE Rut=$rut";
            $query= mysqli_query($conexion,$update);
            header("Location: ver-cuadrilla.php?error=creado&contenido=$rut asumió como nuevo jefe&id=$cua");
        }
    }
}
?>