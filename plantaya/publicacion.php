<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicaciones</title>
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./Ubicacion.js" type="text/javascript"></script>
    <script src="./main.js" type="text/javascript"></script>
</head>
<body>
<?php
  include("requires/nav.php");
  /*session_start();
  if($_SESSION['US_Cod'] == 1 || $_SESSION['US_Cod'] == 2){
    include("requires/nav.php");
  }else{
    include("includes/header.php");
  }*/
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  include 'includes/conexion.php';
  Include 'validarPublicacion.php';
  $tags=mysqli_query($conexion,"SELECT * FROM Tags"); 
  
?>
<main class="container" >
        <div class="container">
            <h1>Listado de Publicaciones activas</h1>
            <div>
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
                                                        while($tag = mysqli_fetch_array($tags))
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
                                        <button class="btn btn-success" type="submit" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" name="submit">Crear publicación</button>
                                        <button class="btn btn-warning" type="button" data-dismiss="modal" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);">Cancelar</button>
                                    </div>
                                </div>           
                            </div>
                        </form>
                    </div>
                </main>
            </div>      
    
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
                        <form action="" method="post" >
                            <tr>
                                <td>
                                    <div class="container" style="background-color: rgba(215, 201, 170, 0.733); border-radius: 10px; border-color: #19535F; border-style:ridge">
                                        <div class="row">
                                            <div class="col-6 col-sm-8">
                                                <div class="row">
                                                    <div class="col-6 col-sm-2" style="display:inline-block; position:relative;overflow: hidden; border-radius: 50%;">
                                                        <img class="redondita" src="
                                                        <?php
                                                            $cfoto="SELECT * FROM Usuario WHERE US_Cod=".$filas['US_Cod'];
                                                            $quieeh=mysqli_query($conexion,$cfoto);
                                                            $arrayfoto=mysqli_fetch_array($quieeh);
                                                            $foto=$arrayfoto['US_Avatar'];
                                                            echo $foto;
                                                        ?>" width="100" height="100">                                                    
                                                    </div>
                                                    <div class="col-6 col-sm-10">
                                                        <div class= "row">
                                                            <div class= "col-6 col-sm-12">
                                                                <label for="tituloPublicacion"><h2><?php echo $filas["PU_Titulo"] ?></h2></label>
                                                            </div>
                                                            <div class= "col-6 col-sm-12">
                                                                <label for="Autor">
                                                                    <?php 
                                                                    $consultaquienfue="SELECT * FROM Usuario WHERE US_Cod=".$filas['US_Cod']; 
                                                                    $quienfue=mysqli_query($conexion,$consultaquienfue); 
                                                                    $fue=mysqli_fetch_array($quienfue);
                                                                    $fuee= $fue['US_Nombre'];
                                                                    echo $fuee;
                                                                    ?> </label>
                                                                <a href="perfil_otro.php?id=<?php echo $id;?>" class="btn btn-primary">Ver Perfil</a>

                                                                <label for="Report" style="color: rgb(123, 45, 38);">| Reportar</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 col-sm-12">
                                                        <?php
                                                            $tienefotox="SELECT * FROM Asociar WHERE PU_Cod=".$filas['PU_Cod'];
                                                            $consulta2=mysqli_query($conexion,$tienefotox);
                                                            $averlafoto=mysqli_fetch_array($consulta2);
                                                            $fototi=$averlafoto['IMG_Cod'];
                                                            if(isset($fototi)){ 
                                                                $resultadoAsocia= mysqli_query($conexion,$tienefotox) or die ("Error en la consulta");
                                                                $rowAsoc=mysqli_num_rows($resultadoAsocia);
                                                                $datoimagen = array();
                                                                $num=0;
                                                                if($rowAsoc>0){
                                                                    
                                                                    while($ress=mysqli_fetch_array($resultadoAsocia)){
                                                                    $idimg = $ress['IMG_Cod'];
                                                                    $imags="SELECT * FROM Imagen WHERE IMG_Cod=".$ress['IMG_Cod']; 
                                                                    $obtenimg=mysqli_query($conexion,$imags); 
                                                                    $obimg=mysqli_fetch_array($obtenimg);
                                                                    $valoraqui= $obimg['IMG_Imagen'];
                                                                    $valorcode= $obimg['IMG_Cod'];
                                                                    $datoimagen[]= array ('num'=>$rowAsoc,'id'=>$valorcode,'img'=>$valoraqui);
                                                                    }
                                                                }
                                                        ?>

                                                        <div id="carruselImg" class="carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img  src="img/Planta Ya!.png" class="d-block w-100" width="200" height="500">
                                                                </div>
                                                                <?php
                                                                    foreach($datoimagen as $value)
                                                                    {   
                                                                                ?>
                                                                                <div class="carousel-item">
                                                                                    <img  src="<?php echo $value['img']; ?>" class="d-block w-100" alt="<?php echo $value['img']; ?>" width="200" height="500">
                                                                                </div>
                                                                                <?php
                                                                    }
                                                             ?>
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
                                                        <?php
                                                        }           
                                                        ?>   
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                if($filas['PU_Contenido']!=NULL){
                                                    ?>
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
                                                    <?php }
                                                    else{
                                                        ?>
                                            <div class="col-6 col-sm-4">
                                            <div class=row>
                                                <div class="col-6 col-sm-12" style="margin-top: 50px;">
                                                        <label for="DescripcionTitulo"><h3>Descripción</h3></label>
                                                </div>
                                                <div class= "col-6 col-sm-12" style="background-color:rgb(240, 243, 245); border-radius:20px">
                                                        <p>Esta publicación no posee descripción.</p>
                                                </div>
                                                <div class="col-6 col-sm-12">
                                                <br>
                                                <a class="btn btn-block  btn-primary" style="background-color:rgb(25, 83, 95); color: rgb(240, 243, 245);" href="contactarvendedor.php?PU_Cod=<?php echo $filas['PU_Cod'] ?>">Contactar</a>
                                                </div>
                                            </div>
                                                    <?php    
                                                    } ?>
                                            
                                        </div>
                                        <br>
                                    </div>
                                </td>
                            </tr>
                        </form>
                            <?php } 
                            }?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>
</html>
