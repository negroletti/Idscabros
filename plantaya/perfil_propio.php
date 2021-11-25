
<?php

  include("includes/connection.php");

    if(isset($_GET['id'])){

      $id = $_GET['id'];
      $query = "SELECT U.US_Nombre,
      U.US_Numero,U.US_Region,U.US_Comuna,U.US_Avatar,U.US_Cod,U.US_Correo, COUNT(P.US_Cod) AS CP
      FROM Usuario U
      LEFT JOIN Publicacion P on P.US_Cod= U.US_Cod
      WHERE U.US_Cod='$id'
      GROUP BY U.US_Nombre,U.US_Numero,U.US_Region,U.US_Comuna,U.US_Avatar,U.US_Cod,U.US_Correo";

      $query_publicaciones = "SELECT US_Cod,PU_Titulo
      from Publicacion
      WHERE Publicacion.US_Cod='$id';";

      $result = mysqli_query($conexion,$query);
      $result_publicaciones = mysqli_query($conexion,$query_publicaciones);

      /*guardo las publicaciones en una array*/
      if(!$result){
        echo "query failed";
      }else{

          $publicaciones = array();
          $count=0;
          while ($row_publicaciones = mysqli_fetch_array($result_publicaciones)) {

            if(isset($row_publicaciones['PU_Titulo'])){
              $publicaciones[$count] = $row_publicaciones['PU_Titulo'];
              $count++;
            }
          }

        $row = mysqli_fetch_array($result);


        if($row['US_Avatar']== null){

          $url = "imagenes/perfil foto.jpg";
        }else{
          $url = $row['US_Avatar'];
        }

    }
  }
?>

<?php
include("includes/header.php");
include("requires/nav.php");
?>


  <div class="card m-4">
    <div class="card-body">
        <div class="row">
          <div class="col-6">
          <img src="<?php echo "$url";?>" class="img-thumbnail" alt="...">
          </div>

          <div class="col-6">
            <div class="row">
              <h2><?php
                echo $row['US_Nombre'];
                //echo $_SESSION['US_Nombre'];
              ?></h2>
                <div class="col-3">
                <p>(
                <?php
              /*  if(isset($row['CP'])){
                  echo $row['CP'];
                }else{
                  echo "No hay";
                }*/
                echo $row['CP'];

                ?> Publicaciones)</p>
                </div>
                <div class="col-2">
                  <a href="editar_usuario.php?id=<?php echo $id;?>"
                    class="btn btn-primary mb-2">
                    Editar
                  </a>
                </div>
            </div>

            <div class="row ">
              <div class="list-group">
                  <div class="list-group-item">
                    <h5>Sector</h5>
                    <P><?php
                        echo $row['US_Region'];
                        //echo $_SESSION['US_Region'];
                        echo ", ";
                        echo $row['US_Comuna'];
                        //echo $_SESSION['US_Comuna'];
                      ?>
                  </P>

                  </div>
                  <div class="list-group-item">
                    <h5>Ultimas publicaciones</h5>
                    <ul>
                      <?php
                        $largo = sizeof($publicaciones);

                          for($i=0;$i<$largo;$i++){ ?>

                          <li> <?php echo "$publicaciones[$i]";?></li>


                      <?php } ?>
                    </ul>
                  </div>
                  <div class="list-group-item d-flex flex-column">
                    <h5>Solicitar contacto</h5>
                    <p>Correo:
                      <?php
                      /*  if(isset($row['US_Correo'])){
                          echo $row['US_Correo'];
                        }else{
                          $_SESSION['US_Correo'];
                        }*/
                        //$_SESSION['US_Correo'];
                        echo $row['US_Correo'];
                        ?></p>
                    <p>Telefono:
                      <?php
                        //  $_SESSION['US_Numero'];
                        echo $row['US_Numero'];

                        ?></p>
                  </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

<?php include("includes/footer.php")?>
