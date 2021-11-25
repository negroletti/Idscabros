<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Categoría</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
    <script src="validarTag.js" type="text/javascript"></script>
</head>
<body>
<?php
  include 'requires/nav.php';
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include('includes/conexion.php');
    include 'validarTag.php';
?>  

    <main class="container" >
        <div class="container">
            <h1>Listado de Categorias activas</h1>
            <div class="panel panel-Primary">
            <table id="tabla_categorias" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <div class="panel-heading">Listado de Categorias</div>
            <div class="panel-body">
                <p>En este listado podras modificar y eliminar categorías de Forma PERMANENTE del sistema</p>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#crearCategoria">
            Añadir Categoría 
        </button> <span style="color: red;">  <?php echo $errorTag;?> </span>
        </div>
            <thead>
                <tr> 
                <th class="th-sm">Id
                </th>
                <th class="th-sm">Nombre Tag
                </th>
                <th class="th-sm"> Operacion
                </th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $sql2 = "SELECT * FROM Tags";
                $resultado= mysqli_query($conexion,$sql2) or die ("Error en la consulta");
                $nr=mysqli_num_rows($resultado);

                if($nr>0){
                    while($filas=mysqli_fetch_array($resultado)){
                        ?>
                <form action="Modificadatos" method="post" >
                <tr>
                <td> <?php echo $filas["TG_Cod"] ?>  </td>
                <td> <?php echo $filas["TG_Tag"] ?> </td>
                <td><a class="btn btn-success" data-toggle="modal" data-target="#modificarCategoria"> <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNNy4xMjcgMjIuNTYybC03LjEyNyAxLjQzOCAxLjQzOC03LjEyOCA1LjY4OSA1LjY5em0xLjQxNC0xLjQxNGwxMS4yMjgtMTEuMjI1LTUuNjktNS42OTItMTEuMjI3IDExLjIyNyA1LjY4OSA1LjY5em05Ljc2OC0yMS4xNDhsLTIuODE2IDIuODE3IDUuNjkxIDUuNjkxIDIuODE2LTIuODE5LTUuNjkxLTUuNjg5eiIvPjwvc3ZnPg=="></a>
                    <a class="btn btn-success" href="eliminaTag.php?TG_Cod=<?php echo $filas['TG_Cod'] ?>" > <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMjQgMjAuMTg4bC04LjMxNS04LjIwOSA4LjItOC4yODItMy42OTctMy42OTctOC4yMTIgOC4zMTgtOC4zMS04LjIwMy0zLjY2NiAzLjY2NiA4LjMyMSA4LjI0LTguMjA2IDguMzEzIDMuNjY2IDMuNjY2IDguMjM3LTguMzE4IDguMjg1IDguMjAzeiIvPjwvc3ZnPg=="></a>
                </td>      
                </tr>
            </form>
                <?php }}?>
            </tbody>
            </table>
            </div>
            </div>

            <div class="modal fade" id="crearCategoria" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true" style="border-radius: 50px;">
                <form action="" method="POST" enctype="multipart/form-data" id="formTag">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="titulin">Añadir Categoria</h1>
                                <button class="btn-close btn-close-white" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-control" style="background-color:rgb(250, 243, 229) ;">
                                    <div class="mb-3">
                                        <label for="TituloTag" class="form-label">Nombre Categoría</label>
                                        <input type="text" class="form-control" id="nombreTag" name="nombreTag" placeholder="Ingresa el nombre aquí." required>
                                        <div id="errorTag1" class="errores"> Ingresa un nombre para la categoría. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" id="submitTag"type="submit" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" name="submitTag">Crear categoría</button>
                                <button class="btn btn-warning" type="button" data-dismiss="modal" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">Cancelar</button>
                            </div>
                        </div>           
                    </div>
                </form>
            </div>
            <div class="modal fade" id="modificarCategoria" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true" style="border-radius: 50px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="titulin">Añadir Categoria</h1>
                                <button class="btn-close btn-close-white" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-control" style="background-color:rgb(250, 243, 229) ;">
                                    <div class="mb-3">
                                        <label for="TituloTag" class="form-label">Nombre Categoría</label>
                                        <input type="text" class="form-control" id="nombreTag2" name="nombreTag2" placeholder="Ingresa el nombre aquí." required>
                                        <div id="errorTag1" class="errores"> Ingresa un nombre para la categoría. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit" href="modificaTag.php?TG_Cod=<?php echo $filas['TG_Cod'] ?>" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" >Crear categoría</button>
                                <button class="btn btn-warning" type="button" data-dismiss="modal" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">Cancelar</button>
                            </div>
                        </div>           
                    </div>
            </div>
        <div class="footer">
            <div> <p>Copyright © 2021 PlantaYa!</p> </div>
        </div>
      
        
    </main>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
