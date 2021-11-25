<?php 
session_start();
include ("includes/conexion.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Constructora ARA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
  </head>
  <body style="background: #144255">
  <header>
    <?php
       
                if($_SESSION['estado']== 0){// admin
                require "requires/nav.php";
                }
                
                if($_SESSION['estado']==1){//trabajadores
                require "requires/nav_trabajador.php";
                }
                
                if($_SESSION['estado']==2){//jefe de cuadrilla
                require "requires/nav_jefe.php";
                }
                if($_SESSION['estado']==3){
                require "requires/nav_inventario.php";
                }

         
           
    ?>
   </header>
  <div class="row" style="margin-top: auto;">
        <div class="col-md-12" >
            <?php
                if(!empty($_GET['error'])){
                    $respuesta = $_GET['error'];
                    $contenido = $_GET['contenido'];
            ?>
            <?php if($respuesta =='creado'){?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }else?>
            <?php if($respuesta == 'eliminado'){?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php } else?>
            <?php if($respuesta == 'trab'){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }?>
            <?php }?>
        </div>
    </div>
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Creacion de Material</h1>
      <br>
        <div class="row">
          <div class="col-md-12">
            <form action="AgregarMaterial.php" method="POST">


                <div class="form-group">
                    <label style="resize:none" for="Textarea1">Descripcion Material:</label>
                    <div class="col-5">
                        <textarea class="form-control" name="DescripcionMaterial" rows="5" Maxlength="255"></textarea>
                        <label>Max. 255 caracteres</label>
                    </div>
                </div>

                <?php $res= $conexion->query("SELECT Id_Inventario FROM Inventario"); ?>
                <div>
                    <label>Inventario:</label>
                    <select name="Inventario">
                        <?php
                            while($rows = $res->fetch_assoc()){
                                $id = $rows['Id_Inventario'];
                                echo "<option value='$id'>$id</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Cantidad comprada:</label>
                    <div class="col-3">
                        <input type="number" class="form-control" name="CantidadComprada">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Precio material:</label>
                    <div class="col-3">
                        <input type="number" class="form-control" name="PrecioMaterial">
                    </div>
                </div>

                <button type="submit"  class="btn btn-success" name="awa">Registrar Material</button>
            </form>
      </div>
  </div>
  <?php require "requires/scripts.php" ?>
  </body>
</html>
