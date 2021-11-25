<?php 

session_start();
include("includes/conexion.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Lista de Cuadrillas</title>



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
            <?php } else?>
            <?php if($respuesta =="nocreado"){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo$contenido?></div>
                </div>
            <?php } ?>
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
                                
                                    <th>Id_Cuadrilla</th>
                                    <th>Acciones</th>
                                
                                </tr>
                
                
                                <tbody>
                
                                    
                                    <hr>
                                    <?php

                                        $id_jefe = $_SESSION['user_id'];
                                        $query = "SELECT * FROM Trabajador 
                                        right join users as u on u.Rut=Trabajador.Rut
                                        WHERE u.id = $id_jefe";
                                        $result_cuadrilla = mysqli_query($conexion,$query);

                                        while($row = mysqli_fetch_array($result_cuadrilla)) { ?>

                                            <tr>
                                                <td><?php echo $row['Id_Cuadrilla']?></td>
                                                
                                                <td>
                                                    <a href="Ver-cuadrilla.php?id=<?php echo $row['Id_Cuadrilla'];?>" class= "btn btn-primary">Ver Cuadrilla</a>
                                                    
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