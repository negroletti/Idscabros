<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
</head>
<body>
<?php
  //session_start();
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include('includes/conexion.php');
  require('requires/nav.php');
?>
   <main class="container" >

        <div class="container">

            <!-- -->

            <h1>Listado de Publicaciones activas</h1>
            <div class="panel panel-Primary">
            <table id="tabla_categorias" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        </div>
            <thead>
                <tr>
                <th class="th-sm"></th>
                </tr>
            </thead>
                <tbody>
                    <?php
                        $tP = $_GET["tP"]; //echo"$tP";

                        if($tP==null){$sql2 = "SELECT * FROM Publicacion ";}
                        else{$sql2 =
                        "
                            SELECT *
                            FROM Publicacion
                            WHERE PU_Titulo LIKE '%{$tP}%'
                        ";}
                        
                        
                        
                        $resultado= mysqli_query($conexion,$sql2) or die ("Error en la consulta");
                        $nr=mysqli_num_rows($resultado);


                        if($nr>0){
                            while($filas=mysqli_fetch_array($resultado)){
                              $id = $filas['US_Cod'];
                                ?>
                    <form action="Modificadatos" method="post" >
                        <tr>
                            <td>
                                <div class="container" style="background-color: rgba(215, 201, 170, 0.733); border-radius: 10px; border-color: #19535F; border-style:ridge">
                                    <div class="row">
                                        <div class="col-6 col-sm-8">
                                            <div class="row">
                                                <div class="col-6 col-sm-2" style="display:inline-block; position:relative;overflow: hidden; border-radius: 50%;">
                                                    <img class="redondita" src="img/perfil.png" width="100" height="100">
                                                </div>
                                                <div class="col-6 col-sm-10">
                                                    <div class= "row">
                                                        <div class= "col-6 col-sm-12">
                                                            <label for="tituloPublicacion"><h2><?php echo $filas["PU_Titulo"] ?></h2></label>
                                                        </div>
                                                        <div class= "col-6 col-sm-12">
                                                            <label for="Autor">Josefina Vargas L. (32 publicaciones)</label>
                                                            <a href="perfil_otro.php?id=<?php echo $id;?>" class="btn btn-primary">Ver Perfil</a>

                                                            <label for="Report" style="color: rgb(123, 45, 38);">| Reportar</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-sm-12">
                                                    <div id="carruselImg" class="carousel slide" data-bs-ride="carousel">
                                                        <div class="carousel-inner">
                                                            <div id="img1" class="carousel-item active">
                                                                <img src="img/Planta Ya!.png" class="d-block w-100" alt="Imagen 1" width="200" height="500">
                                                            </div>
                                                            <div id="img2" class="carousel-item">
                                                                <img src="img/PlantaYa!(3).png" class="d-block w-100" alt="Imagen 2" width="200" height="500">
                                                            </div>
                                                            <div id="img3" class="carousel-item">
                                                                <img src="img/fondo2.png" class="d-block w-100" alt="Imagen 3" width="200" height="500">
                                                            </div>
                                                        </div>
                                                        <button class="carousel-control-prev" type="button" data-bs-target="#carruselImg" data-bs-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Previous</span>
                                                        </button>
                                                        <button class="carousel-control-next" type="button" data-bs-target="#carruselImg" data-bs-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="visually-hidden">Next</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 col-sm-3">
                                                    <img onclick="" class="rounded"  style="border-color: rgb(28,83,95); border-style:ridge" src="img/Planta Ya!.png" alt="" width="200" height="100">
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <img class="rounded"  style="border-color: rgb(28,83,95); border-style:ridge" src="img/PlantaYa!(3).png" alt="" width="200" height="100">
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <img class="rounded"  style="border-color: rgb(28,83,95); border-style:ridge" src="img/fondo2.png" alt="" width="200" height="100">
                                                </div>
                                                <div class="col-6 col-sm-3">
                                                    <img class="rounded"  style="border-color: rgb(28,83,95); border-style:ridge" src="img/fondo2.png" alt="" width="200" height="100">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-sm-4">
                                            <div class=row>
                                                <div class="col-6 col-sm-12" style="margin-top: 50px;">
                                                        <label for="DescripcionTitulo"><h3>Descripción</h3></label>
                                                </div>
                                                <div class= "col-6 col-sm-12" style="background-color:rgb(240, 243, 245); border-radius:20px">
                                                        <p><?php echo $filas["PU_Contenido"] ?></p>
                                                </div>
                                                <div class="col-6 col-sm-12">
                                                <br>
                                               <a class="btn btn-block  btn-primary" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" href="contactarvendedor.php?PU_Cod=<?php echo $filas['PU_Cod'] ?>">Contactar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </td>
                        </tr>
                    </form>
                        <?php }}?>
                </tbody>
            </table>
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
