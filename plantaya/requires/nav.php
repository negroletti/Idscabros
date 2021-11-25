<?php
  session_start();
  $id_general = $_SESSION['US_Cod'];
  if($_SESSION['RN_Cod'] != 1){?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <!-- Brand -->
      <a class="navbar-brand" href="publicacion.php">Inicio</a>

      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item ">
            <a class="nav-link" href="perfil_propio.php?id=<?php echo $id_general?>"
            >
              Ver Perfil
            </a>
          </li>
          <li class="nav-item">
              <form class="form-inline" action="publicacion.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="tP" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar publicacion</button>
              </form>
          </li>
        </ul>
        <li class="nav-item">
          <a class="nav-link" href="contacto.php">
            <button class="btn btn-success">Contactate</button>
          </a>
        </li>
          <div class="col-md-9 d-flex flex-row-reverse">
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
          </div>

      </div>
  </nav>
  <?php }else{  ?>
  <!--administradores-->
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">

    <a class="navbar-brand" href="publicacion.php">Admin</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="tags.php">Listado de tags</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Listar-Usuarios.php">Lista de usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfil_propio.php?id=<?php echo $id_general?>">Ver Perfil</a>
        </li>
        <li class="nav-item">
              <form class="form-inline" action="publicacion.php" method="GET">
                <input class="form-control mr-sm-2" type="search" name="tP" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar publicacion</button>
              </form>
          </li>
        <div class="col-md-9 d-flex flex-row-reverse">
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        </div>
      </ul>
    </div>
  </nav>

<?php } ?>
