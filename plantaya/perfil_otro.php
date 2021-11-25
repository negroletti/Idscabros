
<?php include("includes/connection.php")?>
<?php //include("Consulta_datos.php")?>
<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT U.US_Nombre,
    U.US_Numero,U.US_Region,U.US_Comuna,U.US_Avatar,U.US_Cod,U.US_Correo, COUNT(P.US_Cod) AS CP
    FROM Usuario U
    LEFT JOIN Publicacion P on P.US_Cod= U.US_Cod
    WHERE U.US_Cod='$id'
    GROUP BY U.US_Nombre,U.US_Numero,U.US_Region,U.US_Comuna,U.US_Avatar,U.US_Cod,U.US_Correo";

    $query_publicaiones = "SELECT US_Cod,PU_Titulo
    from Publicacion
    WHERE Publicacion.US_Cod='$id'";

    $result = mysqli_query($conexion,$query);
    $result_publicaciones = mysqli_query($conexion,$query_publicaiones);

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

      $cp = $row['CP'];
      $region = $row['US_Region'];
      $comuna = $row['US_Comuna'];
      $nombre = $row['US_Nombre'];
      $telefono = $row['US_Numero'];
      $correo = $row['US_Correo'];

      if($row['US_Avatar']== null){

        $url = "imagenes/perfil foto.jpg";
      }else{
        $url = $row['US_Avatar'];
      }
    }
  }
?>
<?php include("includes/header.php")?>
<?php include("requires/nav.php")?>
<!--
<form action="Consulta_datos.php" method="POST">
  <div class="form-group">
    <input type="number" name="id">
    <input type="submit" class="btn btn-success btn-block"name="save_id" value="save id">
  </div>
</form>

 Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

 Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
          <div class="row">
              <div class="col-9">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo"$nombre"?></h5>
              </div>
                <div class="col-6">
                <p>(<?php echo "$cp";?> Publicaciones)</p>
                </div>
                <div class="col-2">
                  <a href="">reportar</a>
                </div>
          </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
          <div class="row">
            <div class="col-6">
            <img src="<?php echo "$url";?>" class="img-thumbnail" alt="...">
            </div>

            <div class="col">
              <div class="d-flex justify-content-start flex-column">
                <h2><?php echo"$nombre"?></h2>
                <div class="row">
                  <div class="col-5">
                  <p>(<?php echo "$cp";?> Publicaciones)</p>
                  </div>
                  <div class="col-2">
                    <a href="">reportar</a>
                  </div>
                </div>
              </div>

              <div class="col-6">
                <div class="list-group">
                    <div class="col list-group-item">
                      <h5>Sector</h5>
                      <P><?php echo "$region, $comuna";?></P>
                    </div>
                    <div class="col list-group-item">
                      <h5>Ultimas publicaciones</h5>
                      <ul>
                        <?php
                          $largo = sizeof($publicaciones);

                            for($i=0;$i<$largo;$i++){ ?>

                            <li> <?php echo "$publicaciones[$i]";?></li>


                        <?php } ?>
                      </ul>
                    </div>
                    <div class="col list-group-item d-flex flex-column">
                      <h5>Solicitar contacto</h5>
                      <p>Correo: <?php echo "$correo";?></p>
                      <p>Telefono: <?php echo "$telefono";?></p>
                      <p>whatsapp: <?php echo "$whatsapp";?></p>
                    </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>
</div>-->

    <div class="card m-4">
      <div class="card-body">
          <div class="row">
            <div class="col-6">
            <img src="<?php echo "$url";?>" class="img-thumbnail" alt="...">
            </div>

            <div class="col-6">
              <div class="row">
                <h2><?php echo"$nombre"?></h2>
                  <div class="col-3">
                  <p>(<?php echo "$cp";?> Publicaciones)</p>
                  </div>
                  <div class="col-2">
                    <a href="">reportar</a>
                  </div>
              </div>

              <div class="row ">
                <div class="list-group">
                    <div class="list-group-item">
                      <h5>Sector</h5>
                      <P><?php echo "$region, $comuna";?></P>
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
                      <p>Correo: <?php echo "$correo";?></p>
                      <p>Telefono: <?php echo "$telefono";?></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>




<?php include("includes/footer.php")?>
