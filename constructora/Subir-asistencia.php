<?php 

session_start();
include("includes/conexion.php"); ?>

<?php
    if(isset($_POST['envio'])){

        if($_FILES['archivo']['type']!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'){
            header("Location: lista-cuadrillas.php?error=nocreado&contenido= Su archivo no es excel");
            die();
        }
        else{

            $nombre = $_FILES['archivo']['name'];
            $guardado = $_FILES['archivo']['tmp_name'];


            if(!file_exists('archivos/excel/')){
                mkdir('archivos/excel/',0777,true);
                if(file_exists('archivos/excel/')){
                    if(move_uploaded_file($guardado, 'archivos/excel/'.$nombre)){
                        header("Location: lista-cuadrillas.php?error=creado&contenido=Archivo guardado con exito");
                    }else{
                        header("Location: lista-cuadrillas.php?error=nocreado&contenido=El archivo no se pudo guardar");
                    }
                }
            }else{
                if(move_uploaded_file($guardado, 'archivos/excel/'.$nombre)){
                    header("Location: lista-cuadrillas.php?error=creado&contenido=Archivo guardado con exito");
                }else{
                    header("Location: lista-cuadrillas.php?error=nocreado&contenido=El archivo no se pudo guardar");
                }
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Subir Asistencia</title>



     <!-- Bootstrap CSS -->
     <?php require "requires/head.php" ?>
</head>
<body style="background: #144255">
    <header>
        <?php require "requires/nav.php" ?>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <h1>Por favor seleccione el archivo que quiere enviar</h1>
        <form action="Subir-asistencia.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo">
            <br><br>
            <button name="envio">Subir asistencia </button>
        </form>
    </div> 
</body>