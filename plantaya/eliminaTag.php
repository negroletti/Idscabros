<?php 
require_once ('includes/conexion.php');
include('includes/conexion.php');
$TG_Cod = $_GET['TG_Cod'];
$sql = "DELETE FROM Tags WHERE TG_Cod = '$TG_Cod'";
$resultado= mysqli_query($conexion,$sql) or die ("Error en la consulta");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Categoría</title>
    <script languaje="JavaScript">
    location.href='tags.php';
    </script>
</head>
<body>
</body>
</html>
