<?php 
include("includes/conexion.php");
$id =$_GET['id']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Lista de Trabajadores por Cuadrilla</title>



     <!-- Bootstrap CSS -->
     <?php require "requires/head.php" ?>
</head>

<body style="background: #144255">
    <header>
        <?php require "requires/nav.php" ?>
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
                                
                                    <th>Nombre</th>
                                    <th>Rut</th>
                                    <th>Telefono</th>
                                    <th>Asistencia</th>
                                </tr>
                                
                                <tbody>
                
                                    <!-- CODIGO PHP CUANDO TENGAMOS UNA BDD -->
                                    <h2>Cuadrilla numero: <?php echo $id ?></h2>
                                    <?php
                                        $query = "SELECT Nombre,Rut,Telefono FROM Trabajador WHERE Id_Cuadrilla = $id ";
                                        $result_cuadrillaT = $conexion->query($query);

                                        while($row = mysqli_fetch_array($result_cuadrillaT)) { ?>
                                            <tr>
                                                <td><?php echo $row['Nombre']?></td>
                                                <td><?php echo $row['Rut']?></td>
                                                <td><?php echo $row['Telefono']?></td>
                                                <td>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                       
                                                        <label class="btn btn-success">
                                                            <input type="radio" name="options" id="option2">   Si 
                                                        </label>
                                                        <label class="btn btn-danger">
                                                            <input type="radio" name="options" id="option3">No
                                                        </label>
                                                    </div>
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
                    last: "??ltimo"
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