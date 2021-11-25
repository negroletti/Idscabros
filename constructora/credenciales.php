<?php

   include ("includes/conexion.php");
   session_start();
   
    if(isset($_SESSION['user_id'])){

        header('location: Index.php');
    }

   if(!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = $_POST['email'];
       // echo ($_POST['password']);
        $query = "SELECT * FROM users 
        right join Trabajador as t on t.Rut=users.Rut
        where users.email='$email'  ";

        $results = mysqli_query($conexion, $query) or die("fallo conexion");




        $row = mysqli_fetch_array($results);

        $message = '';
        if (password_verify($_POST['password'], $row['password'])){

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['estado'] = $row['Estado'];
            //echo ($row['Estado']);
            header('location: Index.php');
        }else{
            $message = 'Ingrese sus datos correctamente';
           // header('location: Index.php');
        }
   }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>


    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
</head>
<body style= "background: #144255">

    <?php if(!empty($message)): ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?= $message?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>
      
    
    <?php endif; ?>
    <div class=row style="margin-top: auto">
        <div class="col-md-12">
            <?php
                if(!empty($_GET['error'])){
                    $respuesta = $_GET['error'];
                    $contenido = $_GET['contenido'];
            ?>
            <?php if($respuesta =='vacio'){?>
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }else?>
            <?php if($respuesta == 'err'){?>
                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert"><?php echo $contenido ?></div>
                </div>
            <?php }?>
            <?php }?>
        </div>
    </div>

   <div class="container">
            <div class="row ">
                    <div class="col-md-4 mx-auto">
                       <div class="card card-body" style="margin-top:75%">
                            <h2 class="text-center">Login</h2>
                             <span class="text-center">o <a href="sign_up.php">Registrarse</a></span>
                            <form action="credenciales.php" method="POST">

                               <div class="form-group" >
                                    
                                    <input type="text" name="email" class="form-control" placeholder="Ingresa correo" autofocus>
                               </div>
                              
                                <div class="form-group">
                   
                                    <input type="password" name="password" class="form-control" placeholder="Ingresa tu contraseña"> 

                                </div>
                                <div>
                                <input type="submit" class="btn btn-success btn-block" value="Enviar">  
                                </div>
                   
                            </form>
                   
                   
                       </div>
                    </div>
            </div>
   </div>
    <?php require "requires/scripts.php" ?>
</body>
</html>