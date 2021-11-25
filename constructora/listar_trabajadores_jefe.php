<?php 
 
 session_start();
 include("includes/conexion.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Lista trabajadores</title>



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
            <?php if($respuesta =='eliminado'){?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }else?>
            <?php if($respuesta == 'noeliminado'){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php  }else?>
            <?php if($respuesta=='incompleta'){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }else?>
            <?php if($respuesta == 'vacio'){?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
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
                                
                                    <th>Nombre</th>
                                    <th>Rut</th>
                                    <th>Telefono</th>
                                   
                                
                                </tr>
                
                
                                <tbody>
                
                                    <!-- CODIGO PHP CUANDO TENGAMOS UNA BDD -->

                                    <?php

                                        $query = "SELECT * FROM Trabajador";
                                        $result_trabajadores = mysqli_query($conexion,$query);

                                        while($row = mysqli_fetch_array($result_trabajadores)) { ?>

                                            <tr>
                                                <td><?php echo $row['Nombre']?></td>
                                                <td><?php echo $row['Rut']?></td>
                                                <td><?php echo $row['Telefono']?></td>
                                                
                                            
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