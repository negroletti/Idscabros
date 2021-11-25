<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include('includes/conexion.php');
    $Tag=filter_var(($_POST['nombreTag']),FILTER_SANITIZE_STRING);
    $sql= "INSERT INTO Tags(TG_Tag) values ('$Tag')";
    $resultado3=mysqli_query($conexion,$sql);
?>  
