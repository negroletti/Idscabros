<!DOCTYPE html>
<html lang="en">
<head>
  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<?php
  //session_start();
  include 'includes/conexion.php';
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
    Include 'conexion.php';
    require 'requires/nav.php';
    $sqlsolicita2= "SELECT * FROM Usuario  WHERE US_Cod='$id_general'";
    $resultado2=mysqli_query($conexion,$sqlsolicita2) or die ("No se hizo la consulta");
    //$existe=mysqli_num_rows($resultado);
    if($resultado2){
        $filacorreo2=mysqli_fetch_array($resultado2);
        $fila_correo=$filacorreo2["US_Correo"]; 
    }
  
?>  
                <form action="enviardatos.php" id="formContacto" method="POST">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="titulin">Envíanos Tu Mensaje</h1>
                            </div>
                                <div class="modal-body">
                                <div class="form-control" style="background-color:rgb(250, 243, 229) ;">
                                    <div class="mb-3">
                                        <label for="Categorias" class="form-label">Nombre Usuario</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value=<?php echo $filacorreo2["US_NombreREAL"]?> readonly>
                                    </div><div class="mb-3">
                                        <label for="Categorias" class="form-label">Apellido Usuario</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" value=<?php echo $filacorreo2["US_Apelido"]?> readonly>
                                    </div><div class="mb-3">
                                        <label for="Email" class="form-label">Tu correo Electronico</label>
                                        <input type="text" class="form-control" id="correo" name="correo" value=<?php echo $filacorreo2["US_Correo"]?> readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Email" class="form-label">Mensaje</label>
                                        <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Escribe tu Mensaje" required>
                                    </div>
                                </div>          
                            </div>                                
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" name="submit">Enviar Mensaje</button>
                                    <a href="publicacion.php" class="btn btn-success" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">Cancelar</a> 
                                </div>
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
<?php 
    unset($_SESSION['titulo']);
    //vaciar el resto
?>