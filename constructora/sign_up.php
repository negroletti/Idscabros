

<?php 

include("includes/conexion.php");
$message='';

    if(!empty($_POST['email']) && !empty($_POST['password'])){

        if($_POST['password']==$_POST['confirm_password']){

            $email = $_POST['email'];
            /* password hash pasa el dato que queremos cifrar*/
            //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $rut= $_POST['rut'];
            $query = "INSERT INTO users (email,password,Rut) 
                    VALUES  ('$email','$password','$rut')";

            $result = mysqli_query($conexion,$query) or die("fallo");
            
            if($result){
                header("Location: credenciales.php?error=vacio&contenido=Usuario creado con éxito") ;
            }else{
                header("Location: credenciales.php?error=err&contenido=Usuario no creado") ;
            }
        }
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



      <!-- Bootstrap CSS -->
      <?php require "requires/head.php" ?>
</head>
<body style= "background: #144255">
    


    <div class="container">
        
        <div class="row">
           <div class="col-md-4 mx-auto">

                <div class="card card-body" style="margin-top:75%">

                    <h1 class="text-center">Registrarse</h1>
                        <span class="text-center">o <a href="credenciales.php">Login</a></span>
                        <form action="sign_up.php" method="POST">
                    
                           <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Ingresa el email">
                                
                           </div>

                            <div class="form-group">
                                <input type="text" name="rut" class="form-control" placeholder="Ingresa el rut">
                            </div>

                           <div class="form-group">
                                 <input type="password" name="password" class="form-control" placeholder="Ingresa la contraseña">
                           </div>
                            <div class="form-group">
                               
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirma tu contraseña">
                                
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