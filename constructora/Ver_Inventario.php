<?php 
session_start();
include("includes/conexion.php");

$id =$_GET['id'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Lista de Materiales en Inventario</title>
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
                <?php if($respuesta =='vacio'){?>
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                    </div>
                <?php }else?>
                <?php if($respuesta == 'incompleta'){?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                    </div>

                <?php  }else?>
                <?php if($respuesta=='correcto'){?>
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                    </div>
                <?php }else?>
                <?php if($respuesta == 'wrongdate'){?>
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                    </div>
                <?php }?>
                <?php }?>
            </div>
        </div>
        <div class="jumbotron jumbotron-fluid">
            <div class="row ">
                <div class="container">
                    <div class="col-md-12 mx-auto">
                        <table class= "table table-bordered" id="usuarios">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id_Inventario</th>
                                    <th>Id_Material</th>
                                    <th>Cantidad_actual</th>
                                    <th>Descripcion_Material</th>
                                    <th>Acciones</th>
                                </tr>
                                    
                                    <tbody>
                    
                                        <!-- CODIGO PHP CUANDO TENGAMOS UNA BDD -->
                                        <h2>Inventario numero: <?php echo $id ?></h2>
                                        <?php
                                            $query = "SELECT Esta.Id_Inventario, Esta.Id_Material, Esta.Cantidad_actual, Material.Descripcion_Material FROM Esta INNER JOIN Material WHERE Id_Inventario = $id 
                                            && Esta.Id_Material = Material.Id_Material";
                                            $result_inventario = $conexion->query($query);

                                            while($row = mysqli_fetch_array($result_inventario)) { ?>

                                                <tr>
                                                    <td><?php echo $row['Id_Inventario']?></td>
                                                    <td><?php echo $row['Id_Material']?></td>
                                                    <td><?php echo $row['Cantidad_actual']?></td>
                                                    <td><?php echo $row['Descripcion_Material']?></td>
                                                    <td>
                                                        <a href="ModificarMaterial.php?Id_Material=<?php echo $row['Id_Material'];?>" class= "btn btn-primary">Modificar Material</a>
                                                    </td>
                                                </tr>

                                        <?php } ?>
                                    </tbody>
                    
                                </thead>
                            
                            
                            </table>
                        </div>
                    
                    </div>
                
            
            
            </div>
    </div>



<?php require "requires/scripts.php" ?>
</body>
</html>

<script type="text/javascript">
                 $(document).ready(function() {
                 $('#usuarios').DataTable({
                 language: {
                search: "Buscar:",
                paginate: {
                    first: "Primer",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Último"
                },
                info: "Mostrando del _START_ al _END_ de _TOTAL_ resultados disponibles",
                emptyTable: "No existen elementos para mostrar en la tabla",
                infoEmpty: "Mostrando del 0 al 0 de 0 resultados",
                infoFiltered: "(Filtrado de _MAX_ resultados)",
                lengthMenu: "Mostrando _MENU_ resultados",
                loadingRecords: "Cargando...",
                processing: "Procesando...",
                zeroRecords: "No se encontraron resultados",
                aria: {
                    sortAscending: ": Ordenado de forma ascendente",
                    sortDescending: ": Ordenado de forma descendente"
                }

            }
        });
    });
</script>