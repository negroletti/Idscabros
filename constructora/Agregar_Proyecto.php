<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Agregar Proyecto</title>
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
            <h1 class="display-4">Creacion de proyecto</h1>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <?php 
                        if(!empty($_GET['error'])){
                            $respuesta = $_GET['error'];
                            $contenido = $_GET['contenido'];
                    ?>
                    <?php if($respuesta=='nonombre'){ ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                            </div>
                    <?php }else?>
                    <?php if($respuesta="wrongdate"){?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }else ?>
                    <?php if($respuesta="nodesc"){?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }else?>
                    <?php if($respuesta=='tipo'){?>
                        <div class="col-md-12">
                            <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }else?>
                    <?php if($respuesta=='noadd'){?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                            </div>
                    <?php }else?>
                    <?php if($respuesta=='agregado'){?>
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                        </div>
                    <?php }?>
                    <?php }?>
                </div>
            </div>
            <HR>
            <form action="AgregarProyecto.php" method="POST">
                <div class="form-group">

                    <label for="exampleFormControlInput1">Nombre Proyecto:</label>

                    <div class="col-3">
                        <input type="text" class="form-control" name="Nameproyect"
                        Maxlength="30" >
                        <label>Max. 30 caracteres</label>
                    </div>
                </div>
                <?php $res=$conexion->query("SELECT * FROM Tipo_Proyecto");?>
                <div>
                    <label>Tipo proyecto</label>
                    <select name="idtipo">
                    <?php 
                        while($roww=$res->fetch_assoc())
                        {
                            $it=$roww['Id_tipo'];
                            $nt=$roww['Nombre_tipo'];
                            echo "<option value= '$it'>$it $nt</option>";
                        }
                    
                    ?>
                    </select>
                </div>
                <?php $res= $conexion->query("SELECT Id_Cuadrilla FROM Cuadrilla"); ?>
                
                <div>
                    <label>Cuadrilla:</label>
                    <select name="cuadrilla">
                        <?php
                            while($rows = $res->fetch_assoc()){
                                $id = $rows['Id_Cuadrilla'];
                                echo "<option value='$id'>$id</option>";
                            }
                        ?>
                    </select>
                </div>
            
                <?php $res= $conexion->query("SELECT Id_Inventario FROM Inventario");?>
                <div>
                    <label>Id inventario</label>
                    <select name="UsandoInventario" >
                        <?php 
                            while($row=$res->fetch_assoc()){
                                $ii=$row['Id_Inventario'];
                                echo "<option value='$ii'>$ii</option>";
                            }
                        
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label style="resize:none" for="Textarea1">Descripcion Proyecto:</label>
                    <div class="col-5">
                        <textarea class="form-control" name="Descripcionpro" rows="5" Maxlength="255"></textarea>
                        <label>Max. 255 caracteres</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date-input" class="col-2 col-form-label">Fecha inicio:</label>
                    <div class="col-3">
                        <input class="form-control" type="date" value="2020-10-01" name="FechaInicio">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date-input" class="col-2 col-form-label">Fecha Termino:</label>
                    <div class="col-3">
                        <input class="form-control" type="date" value="2020-10-01" name="FechaTermino">
                    </div>
                </div>  

                <button type="submit" class="btn btn-success" name="awa">Registrar proyecto</button>

            </form>
        </div>
    </div>
  <?php require "requires/scripts.php" ?>
  </body>
</html>