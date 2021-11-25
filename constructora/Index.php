 <?php 
 
  session_start();
  include ("includes/conexion.php");
 
  if(isset($_SESSION['user_id'])){
    $usuario = TRUE;

    $id = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conexion,$query);
    $row = mysqli_fetch_array($result);
    $user=null;


    if(count($row)>0){
      $user = $row;
      $_SESSION['e'] = 1;
    }
  }else{
    $usuario = FALSE;
  }

 /* if(isset($_SESSION['estado'])){
    echo ($_SESSION['estado']);
  }*/
 
 
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Constructora ARA</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
  </head>
  <body style="background: #144255">
  <header> 
  
    <?php 

      if($usuario){
        if($_SESSION['estado']== 0){// admin
          require "requires/nav.php";
        }
        
        if($_SESSION['estado']==1){//trabajadores
          require "requires/nav_trabajador.php";
        }
        
        if($_SESSION['estado']==2){//jefe de cuadrilla
          require "requires/nav_jefe.php";
        }
        if($_SESSION['estado']==3){
          require "requires/nav_inventario.php";
        }

      }else{
        require "requires/nav_inicio.php";
      }
    ?> 
  
  
  </header>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Bienvenidos y Bienvenidas a la página principal de Constructora Ara.</h1>
        <p class="lead">Esta página está actualmente en desarrollo, solicitamos paciencia por favor.</p>
    </div>
  </div>

  <?php require "requires/scripts.php" ?>
  </body>
</html>