<?php 
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Agregar Trabajador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
    <?php include ("includes/conexion.php")  ?>
  </head>
<body style="background: #144255">
    <header><?php require "requires/nav.php"?></header>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Creacion de Trabajador</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if(!empty($_GET['error'])){
                            $respuesta = $_GET['error'];
                            $contenido = $_GET['contenido'];
                    ?>
                    <?php if($respuesta=='ruttrab'){ ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                            </div>
                    <?php }else?>
                    <?php if($respuesta="Nametrab"){?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }else ?>
                    <?php if($respuesta="Teleftrab"){?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }?>
                <?php }?>
                </div>
            </div>
            <HR>
            <form action="Agregar_Trabajador.php" method="POST">
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rut:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="ruttrab" Maxlength="9">
                        <label>Max. 9 caracteres, sin puntos ni guion</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre Completo:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="Nametrab" Maxlength="60" >
                        <label>Max. 60 caracteres</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ControlSelect1">Telefono:</label>
                    <div class="col-3">
                        <input type="number" class="form-control" name="Teleftrab" Maxlength="8">
                        <label>Max. 8 digitos</label>
                    </div>
                </div>

                <?php $res= $conexion->query("SELECT Id_Cuadrilla FROM Cuadrilla"); ?>
                <div>
                    <label>Id Cuadrilla:</label>
                    <select name="cuadrilla">
                        <?php
                            while($rows = $res->fetch_assoc()){
                                $id = $rows['Id_Cuadrilla'];
                                echo "<option value='$id'>$id</option>";
                            }
                        ?>
                    </select>
                    <br>
                </div>
                <br>
                
                <button type="submit" class="btn btn-success" name="owo">Registrar Trabajador</button>

            </form>
        </div>
    </div>
  <?php require "requires/scripts.php" ?>
  </body>
</html>