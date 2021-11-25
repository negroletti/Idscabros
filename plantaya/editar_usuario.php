
<?php

    include("includes/connection.php");

    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $query = "SELECT *
                FROM Usuario U
                WHERE U.US_Cod='$id';";

      $result = mysqli_query($conexion,$query);

      if(mysqli_num_rows($result)==1){
        $row =mysqli_fetch_array($result);
        $nombre = $row['US_Nombre'];
        $correo = $row['US_Correo'];
        $telefono = $row['US_Numero'];
      }
    }

    if(isset($_POST['Actualizar'])){
      $id = $_GET['id'];
      $US_COD = $_GET['id'];
      $nombre = $_POST['usuario_nombre'];
      $numero = $_POST['usuario_telefono'];
      $correo = $_POST['usuario_email'];

      $query = "UPDATE Usuario set
      US_Nombre = '$nombre',
      US_Correo = '$correo',
      US_Numero = '$numero'
      WHERE US_COD = '$id'";

    /*  $query_usuario = "UPDATE DATOS_USUARIOS set
      DU_NUMERO = '$numero',
      DU_CORREO1 = '$correo'
      WHERE DU_COD = '$id'";*/

      $prueba2 = mysqli_query($conexion,$query);

    //  $prueba = mysqli_query($conexion,$query_usuario);

      if(!$prueba2){
        die("query failed");
      }else{
        header("location: perfil_propio.php?id=$id");
      }
    }
?>

<?php include("includes/header.php")?>
  <div class="container p-4">
    <div class="row">
      <div class="col-md-4 mx-auto">
        <div class="card card-body">
          <form action="editar_usuario.php?id=<?php echo $_GET['id'];?>" method="POST">


            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                name="usuario_nombre"
                placeholder="Edite su nombre"
                value="<?php echo $nombre;?>">
          </div>
          <div class="mb-3">
            <input
              type="email"
              name="usuario_email"
              class="form-control"
              value="<?php echo $correo;?>">
          </div>
          <div class="mb-3">
            <input
              type="tel"
              name="usuario_telefono"
              class="form-control"
              value="<?php echo $telefono;?>">
          </div>
          <div class="mb-3">
            <button class="btn btn-success col-12" name="Actualizar">
              Actualizar
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include("includes/footer.php")?>
