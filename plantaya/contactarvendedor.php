<?php
  //session_start();
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

    
    Include 'includes/conexion.php';
    include 'requires/nav.php';
    
    
    $id_publicacion=$_GET['PU_Cod'];
    $sqlsolicita= "SELECT * FROM Publicacion  WHERE PU_Cod='$id_publicacion'";
    $resultado=mysqli_query($conexion,$sqlsolicita) or die ("No se hizo la consulta");
    //$existe=mysqli_num_rows($resultado);
    if($resultado){
        $id_usuariopubl=mysqli_fetch_array($resultado);
        $fila_usuariopubl=$id_usuariopubl["US_Cod"];   
        $sqlusuar = "SELECT U.US_Cod, U.US_Correo,
        COUNT(U.US_Cod) 
        FROM Usuario U
        RIGHT JOIN Publicacion P ON U.US_Cod=P.US_Cod
        WHERE U.US_Cod=$fila_usuariopubl";
        $resultadocorreo=mysqli_query($conexion,$sqlusuar) or die ("Error en la consulta");
        $filacorreo=mysqli_fetch_array($resultadocorreo);
        $correo_usuario=$filacorreo["US_Correo"];
    }
    $sqlsolicita2= "SELECT * FROM Usuario  WHERE US_Cod='$id_general'";
    $resultado2=mysqli_query($conexion,$sqlsolicita2) or die ("No se hizo la consulta");
    //$existe=mysqli_num_rows($resultado);
    if($resultado2){
        $filacorreo2=mysqli_fetch_array($resultado2);
        $fila_correo2=$filacorreo2["US_Correo"]; 
    }
    
    /*$_datos=$_SESSION["US_Nombre"];
    $sqlsolicita2= "SELECT * FROM usuario  WHERE US_Nombre=$datos";
    $resultado2=mysqli_query($conexion,$sqlsolicita2);
    $existe2=mysqli_num_rows($resultado2);
    if($existe2>0){
        $usuario=mysqli_fetch_array($resultado2);
        $correousuario=$usuario["US_Correo"];   
        /*$sqlusuar = "SELECT U.US_Correo,
        FROM usuario U
        RIGHT JOIN publicacion P ON U.US_Cod=P.US_Cod
        WHERE U.US_Cod=$fila_usuariopubl";
        $resultadocorreo=mysqli_query($conexion,$sqlusuar) or die ("Error en la consulta");
        $filacorreo=mysqli_fetch_array($resultadocorreo);
        $correo_usuario=$filacorreo["US_Correo"];} */
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactar al vendedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./Ubicacion.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
</head>
<body>
   
                <form action="enviarmensaje.php" id="formContactar" method="GET">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="titulin">Envíale un Mensaje</h1>
                                
                            </div>
                                <div class="modal-body">
                                <div class="form-control" style="background-color:rgb(250, 243, 229) ;">
                                    <div class="mb-3">
                                        <label for="EmailPu" class="form-label">Correo Destino</label>
                                        <input type="text" class="form-control" id="id" name="id" value=<?php echo $filacorreo["US_Correo"] ?> readonly>
                                    </div><div class="mb-3">
                                        <label for="Asunto" class="form-label">Asunto</label>
                                        <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingresa el Asunto" required>
                                    </div><div class="mb-3">
                                        <label for="Email" class="form-label">Contacto Interesado</label>
                                        <input type="text" class="form-control" id="correo" name="correo" value=<?php echo $filacorreo2["US_Correo"]?> readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="Mensaje" class="form-label">Mensaje</label>
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
                                
            </div>-->
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
