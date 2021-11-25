<?php
session_start();

include("includes/conexion.php")?>



<?php

    if(isset($_POST['envio'])){
        if($_FILES['archivo']['type']!='application/pdf'){
            header("Location:listar_trabajadores.php?error=incompleta&contenido= Su archivo no es pdf");
            die();
        }
        else{

            $nombre = $_FILES['archivo']['name'];
            $guardado = $_FILES['archivo']['tmp_name'];


            if(!file_exists('archivos/pdf/')){
                mkdir('archivos/pdf',0777,true);
                if(file_exists('archivos')){
                    if(move_uploaded_file($guardado, 'archivos/pdf/'.$nombre)){
                        header('Location: listar_trabajadores.php?error=vacio&contenido=Archivo guardado con exito');
                    }else{
                        header("Location: listar_trabajadores.php?error=incompleta&contenido=El archivo no se pudo guardar");
                    }
                }
            }else{
                if(move_uploaded_file($guardado, 'archivos/pdf/'.$nombre)){
                    header('location: listar_trabajadores.php?error=vacio&contenido=Archivo guardado con exito');
                }else{
                    header("Location: listar_trabajadores.php?error=incompleta&contenido=El archivo no se pudo guardar");
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
    <title>Subir Documentos</title>



     <!-- Bootstrap CSS -->
     <?php require "requires/head.php" ?>
</head>
<body style="background: #144255">
    <header>
        <?php require "requires/nav.php" ?>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <h1>Por favor seleccione el archivo que quiere enviar</h1>
        <form action="subir_pdf.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="archivo">
            <br><br>
            <button name="envio">Subir archivo</button>
        
        </form>
    </div> 
</body>