<!--TODO: Fix the Backend -->

<?php 
include ("includes/conexion2.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/lista_pro.css">
    <title>Lista Usuarios</title>

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
            <?php if($respuesta == 'incompleta'){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                </div>

            <?php  }?>
            <?php }?>
        </div>
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="row ">
        
                <div class="container">
                        
                        
                    
                    <div class="col-md-14 mx-auto">
                        <table class= "table table-bordered" id="usuarios">
                        
                            <thead class="thead-dark">
                                <tr>
                                    <th>Code</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Nombre Real</th>
                                    <th>Apellidos</th>
                                    <th>Telefono</th>
                                    <th>Comuna</th>
                                    <th>Region</th>
                                    <th>Correo</th>
                                    <th>Acciones</th>
                                </tr>
                
                
                                <tbody>
                
                                    <!-- CODIGO PHP CUANDO TENGAMOS UNA BDD -->
                                    <?php   
                                        $query = "SELECT * FROM  Usuario";
                                        $result_users= mysqli_query($conexion,$query);
                                        while($row = mysqli_fetch_array($result_users)){ ?>
                                            <tr>
                                                <td><?php echo $row['US_Cod']; ?></td>
                                                <td><?php echo $row['US_Nombre'];?></td>
                                                <td><?php echo $row['US_NombreREAL'];?></td>
                                                <td><?php echo $row['US_Apelido'];?></td>
                                                <td><?php echo $row['US_Numero'];?></td>
                                                <td><?php echo $row['US_Comuna'];?></td>
                                                <td><?php echo $row['US_Region'];?></td>
                                                <td><?php echo $row['US_Correo'];?></td>
                                                
                                                <td>
                                                    <a href="Modificar-Usuario.php?id=<?php echo $row['US_Cod'];?>" class= "btn btn-success">Editar</a>
                                                    <hr>
                                                    <a href="Borrar-Usuario.php?id=<?php echo $row['US_Cod'];?>" class= "btn btn-danger" onclick="return confirm('Está segur@ que desea eliminar el usuario?');">Borrar</a>
                                                </td>

                                            </tr>
                                        
                                    <?php }?>
                                    
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