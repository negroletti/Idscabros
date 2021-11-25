<!--TODO: Fix Front & Back end-->

<?php
    include ("includes/conexion2.php");
    $id = $_GET['id'];

    $sql = "SELECT * FROM Usuario WHERE US_Cod =$id";
    $result = $conexion->query($sql);
    $resultado = $result->fetch_assoc();

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM Usuario Where US_Cod = '$id'";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result);
            $uname = $row['US_Nombre'];
            $name = $row['US_NombreREAL'];
            $lname = $row['US_Apelido'];
            $wtsp = $row['US_Numero'];
            $email = $row['US_Correo'];
            $region = $row['US_Region'];
            $comu = $row['US_Comuna'];
        }
        else{
            header("Location: Listar-Usuarios.php?error=incompleta&contenido=No existe el id");
        }
    }
    
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $uname = $_POST['uname'];
        $name = $_POST['name'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $mail = $_POST['mail'];
        $region = $_POST['region'];
        $city = $_POST['city'];
  
        $update ="UPDATE Usuario SET US_Nombre='$uname', US_NombreREAL= '$name',US_Apelido='$lname',
        US_Numero='$phone', US_Correo='$mail', US_Region='$region', US_Comuna='$city' WHERE US_Cod = $id";

        $query = mysqli_query($conexion, $update);
        if($query==1){
            header("Location: Listar-Usuarios.php?error=vacio&contenido=Usuario modificado con éxito");
        }else{
            header("Location: Listar-Usuarios.php?error=incompleta&contenido=No se logró actualizar el perfil");
        }

    }
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Modificar Usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
  </head>
<body style="background: #144255">
    <div class="jumbotron jumbotron-fluid">
        <div class="container col-md-10 mx-auto">
            <h1 class="display-2">Modificacion de Usuario</h1>
            <br>
            <form action="Modificar-Usuario.php?id=<?php echo $id?>" method="POST">
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre de Usuario:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="uname" value="<?php echo $resultado['US_Nombre'];?>"
                        placeholder="Nuevo nombre de usuario">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre Real:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="name" value="<?php echo $resultado['US_NombreREAL'];?>"
                        placeholder="Nuevo nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Apellidos :</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="lname" value="<?php echo $resultado['US_Apelido'];?>"
                        placeholder="Nuevo apellido">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Telefono:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="phone" value="<?php echo $resultado['US_Numero']?>"
                        placeholder="Nuevo Telefono">
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Correo:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="mail" value="<?php echo $resultado['US_Correo']?>"
                        placeholder="Nuevo Correo">
                    </div>
                </div>
                <div>
                    <label>Región:</label>
                    <br>
                    <select name="region">
                        <?php
                            echo"<option value=1>Arica y Parinacota</option>";
                            echo"<option value=2>Tarapacá</option>";
                            echo"<option value=3>Antofagasta</option>";
                            echo"<option value=4>Atacama</option>";
                            echo"<option value=5>Coquimbo</option>";
                            echo"<option value=6>Valparaíso</option>";
                            echo"<option value=7>Metropolitana</option>";
                            echo"<option value=8>Libertador General Bernardo O'Higgins</option>";
                            echo"<option value=9>Maule</option>";
                            echo"<option value=10>Ñuble</option>";
                            echo"<option value=11>Bio Bio</option>";
                            echo"<option value=12>Araucanía</option>";
                            echo"<option value=13>Los Rios</option>";
                            echo"<option value=14>Los Lagos</option>";
                            echo"<option value=15>Aysén del General
                            Carlos Ibáñez del Campo</option>";
                            echo"<option value=16>Magallanes y de la Antártica Chilena</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ControlSelect1">Comuna:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="city"
                        placeholder="Nueva Comuna"
                        value=<?php echo $resultado['US_Comuna']?>>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="update" onclick="return confirm('¿Está seguro que quiere modificar este usuario?');">Modificar usuario</button>
                <a href="Listar-Usuarios.php" class="btn btn-danger">Cancelar modificación</a>
                </div>
            </form>
        </div>
    </div>
  <?php require "requires/scripts.php" ?>
  </body>
</html>