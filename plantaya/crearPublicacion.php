<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear publicación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./Ubicacion.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
</head>
<body>
<?php
  session_start();
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

    include('includes/conexion.php');
    Include 'validarPublicacion.php';
    $consulta=mysqli_query($conexion,"SELECT * FROM Tags"); 
?>  

    <main class="container" >
        <div class="mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#crearPublicacion">
            Crear publicación
        </button>
        <span style="color: red;"> <?php echo $errortitulo;?> </span>
        <span style="color: red;"> <?php echo $errordescripcion;?> </span>
        <span style="color: red;"> <?php echo $errorimagen;?> </span>
        </div>

            <div class="modal fade" id="crearPublicacion" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true" style="border-radius: 50px;">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="titulin">Crear publicación</h1>
                                <button class="btn-close btn-close-white" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-control" style="background-color:rgb(250, 243, 229) ;">
                                    <div class="mb-3">
                                        <label for="TituloPublicacion" class="form-label">Título</label>
                                        <input type="text" class="form-control" id="tituloPublicacion" name="tituloPublicacion" placeholder="Ingresa el título aquí." required>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="Categorias" class="form-label">Categoría</label>
                                        <select class="form-control" name="categoria" id="categoria">
                                            <?php 
                                                while($tag = mysqli_fetch_array($consulta))
                                                {

                                                
                                            ?>
                                            <option value="<?php echo $tag['TG_Cod'] ?>"><?php echo $tag['TG_Tag'] ?></option>
                                               <?php } ?>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ubic" class="form-label">Selecciona ubicación de publicación</label>
                                        <select class="form-control" id="regiones"></select>
                                        <br>
                                        <select name="comunas" id="comunas" class="form-control"></select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">¿Desea añadir una descripción?</label>
                                        <input type="checkbox" class="form-label" id="deseaDesc" onchange="javascript:showContent()" name="deseaDesc">
                                        
                                    </div>
                                    <div class="mb-3" id="infoDesc" style="display:none;">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="text" class="form-control" name="descripcionPublicacion"id="descripcionPublicacion" placeholder="Ingresa aquí la descripción.">
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">¿Desea añadir fotografías?</label>
                                        <input type="checkbox" class="form-label" id="deseaFoto" onchange="javascript:showContent2()" name="deseaFoto">
                                    </div>
                                    <div class="mb-3"style="display:none;" id=infoFoto>
                                        <label for="formFile" class="form-label" >Fotografías</label>
                                        <input class="form-control" type="file" id="archivo[]" name="archivo[]" multiple="">
                                    </div>
                                </div>          
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success" type="submit" onclick="validar()" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" name="submit">Crear publicación</button>
                                <button class="btn btn-warning" type="button" data-dismiss="modal" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">Cancelar</button>
                            </div>

                        </div>           
                    </div>
                </form>
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
