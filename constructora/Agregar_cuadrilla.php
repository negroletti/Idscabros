<?php 


include ("includes/conexion.php");

$select = "SELECT MAX(Id_Cuadrilla) as A FROM Cuadrilla";
$query1 = $conexion->query($select);
$row = $query1->fetch_assoc();
$lastid = $row['A'];
$insert = "INSERT INTO Cuadrilla VALUES($lastid+1)";
$query = $conexion->query($insert);

if($query == 1){
    header("Location: lista-cuadrillas.php?error=creado&contenido=Cuadrilla agregada con exito");
}
else{
    header("Location: lista-cuadrillas.php?error=nocreado&contenido=cuadrilla no creada");
}
?>
