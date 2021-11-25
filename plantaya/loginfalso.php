
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>


    <!-- Bootstrap CSS -->
    <?php require "extensiones/head.php" ?>
</head>
<body background="img/PlantaYa!(3).png">
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
                            
                            <form action="login.php" method="POST">
                   
                               <div class="form-group" >
                                    <h2 class="text-center">Login</h2>
                                    <input type="text" name="usuario" class="form-control" placeholder="Ingrese Usuario" aria-describedby="emailHelp"  autofocus>
                               </div>
                              
                                <div class="form-group">
                   
                                    <input type="password" name="password" class="form-control" placeholder="Ingrese contraseña"> 
                                
                                </div>
                              
                              <div class="form-group">
                                
                                    <input type="submit" class="btn btn-success btn-block" value="Ingresar"> 

                                </div>

                                <div class="form-group">
                                
                                <a href="Registro.php"><h8>¿No tienes Cuenta? Registrate</h8></a> 

                                </div>
                   
                            </form>
                   
                   
                       </div>
                    </div>
               
               
            </div>
       
       
   </div>


    <?php require "extensiones/boostrap.php" ?>
</body>
</html>
