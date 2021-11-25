<?php
//esta es la parte logica de la pag

    //para hacer el acceso
    $alarma='';
    //if(!empty($_POST)){
   //     echo $alarma= "apretado el boton";
   // }

    if(empty($_POST['usuario']) || empty($_POST['password'])){
        echo $alarma = 'Ingrese su usuario o contraseña';
    }else{
         //$message='Ingresando';
         include('includes/conexion2.php');
         $usuario = $_POST['usuario'];
         $clave = $_POST['password'];

         $query = mysqli_query($conexion, "SELECT *
         FROM Usuario
         WHERE US_Nombre='$usuario'
         AND US_Contrasena='$clave'");

         $result = mysqli_num_rows($query);

         if($result > 0){
             $datos = mysqli_fetch_array($query);
            //print_r($datos);

            session_start();
            $_SESSION['US_Cod'] = $datos['US_Cod'];
            $_SESSION['US_Nombre'] = $datos['US_Nombre'];
            $_SESSION['US_Estado'] = $datos['US_Estado'];
            $_SESSION['RN_Cod'] = $datos['RN_Cod'];
            $_SESSION['US_NombreReal'] = $datos['US_NombreReal'];
            $_SESSION['US_Apellido'] = $datos['US_Apellido'];
            $_SESSION['US_Correo'] = $datos['US_Correo'];
            $_SESSION['US_Numero'] = $datos['US_Numero'];
            $_SESSION['US_Region'] = $datos['US_Region'];
            $_SESSION['US_Comuna'] = $datos['US_Comuna'];
            $_SESSION['US_Avatar'] = $datos['US_Avatar'];

            //session_abort();



            header('location: publicacion.php');

         }else{
             echo 'Datos Erroneos';
             header('index.php');
         }

         //$query = "SELECT * FROM Usuario WHERE US_Nombre='$usuario'";

        /*
         $result = mysqli_query($conexion, $query) or die("fallo de registro".mysqli_error());

         $row = mysqli_fetch_array($result);

         $message = '';
         if(password_verify($_POST['password'], $row['US_Contrasena'])){
             if($row['RN_Cod']== 1){
                 $_SESSION['US_Nombre'] = $row[['US_Nombre']];
                 header('location: MenuAdmin.php');
             }elseif($row['RN_Cod']== 2){
                $_SESSION['US_Nombre'] = $row[['US_Nombre']];
                header('location: MenuUser.php');
            }
            */

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingrese</title>


    <!-- Bootstrap CSS -->
    <?php require "extensiones/head.php" ?>
</head>
<body background="img/fondo2.png">
    <header >

    </header>

    <?php if(!empty($message)): ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $message?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>


    <?php endif; ?>


   <div class="container">


            <div class="row ">


                    <div class="col-md-4 mx-auto">

                       <div class="card card-body" style="margin-top: 50%">

                            <form action="index.php" method="POST">

                               <div class="form-group" >
                                    <h2 class="text-center">Ingrese</h2>
                                    <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario" aria-describedby="emailHelp"  autofocus>
                               </div>

                                <div class="form-group">

                                    <input type="password" name="password" class="form-control" placeholder="Ingrese contraseña">

                                </div>

                              <div class="form-group">

                                    <input type="submit" class="btn btn-success btn-block" value="Ingresar">

                                </div>

                                <div class="form-group">

                                <a href="registrate.php"><h8>¿No tienes Cuenta? Registrate</h8></a>

                                </div>

                            </form>


                       </div>
                    </div>


            </div>


   </div>


    <?php require "extensiones/boostrap.php" ?>
</body>
</html>
