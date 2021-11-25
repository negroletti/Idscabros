
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="Index.php">
    <img src="Images/ara.png" width="50" height="50" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>




  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Proyectos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Agregar_Proyecto.php">Agregar Proyectos</a>
          <a class="dropdown-item" href="lista_proyectos.php">Lista de Proyectos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Trabajadores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="AgregarTrabajador.php">Agregar Trabajadores</a>
          <a class="dropdown-item" href="listar_trabajadores.php">Lista de Trabajadores</a>
          <a class="dropdown-item" href="lista-cuadrillas.php">Lista de Cuadrillas</a>
        </div>
      </li>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inventario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Agregar_Material.php">Agregar materiales</a>
          <a class="dropdown-item" href="Inventario.php">Listar inventario</a>
        </div>
      </li>
    </ul>




    <ul class="navbar-nav mr-left">

      <?php if(!empty($user)): ?>
        
        <div class="col-md-2 mx-auto">
        
          <p class="text-white"> welcome. <?= $user['email'] ?></p>
          
          <a href="logout.php" class="btn btn-primary">logout</a>
        </div>
      <?php elseif($_SESSION['e'] == 1): ?>

        <div class="col-md-2 mx-auto">
        
        <a href="logout.php" class="btn btn-primary">logout</a>

        </div>

      <?php else: ?>

          <li class="nav-item">
              <a class="nav-link" href="credenciales.php">Ingresar</a>
          </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>