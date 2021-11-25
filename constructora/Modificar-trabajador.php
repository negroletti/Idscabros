<?php
    include ("includes/conexion.php");

    $codigo = $_GET['id'];

    $sql = "SELECT * FROM Trabajador WHERE Rut ='$codigo'";
    $resultado = $conexion->query($sql);
    $resultado = $resultado->fetch_assoc();


    if(isset($_GET['id'])){
        $Rut = $_GET['id'];
        $query = "SELECT * FROM Trabajador Where Rut ='$Rut'";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) ==1){
            $row = mysqli_fetch_array($result);
            $Nombre = $row['Nombre'];
            $Rut = $row['Rut'];
            $Telefono = $row['Telefono'];
            $ID_Cuadrilla = $row['Id_Cuadrilla'];
        }
        else{
            header("Location: listar-trabajadores.php?error=incompleta?contenido= Trabajador no existe");
        }
    }
    
    if(isset($_POST['update'])){
        trim($Nombre = $_POST['Nombre']);
        trim($Rut = $_GET['id']);
        trim($Telefono = $_POST['Telefono']);
        $ID_Cuadrilla=$_POST['cuadrilla'];
        $tt = $_POST['tt'];
        if(empty ($Nombre) || empty($Rut) || empty($Telefono)){
            header("Location: listar_trabajadores.php?error=incompleta&contenido=DEBE ingresar todos los nuevos datos");
        }
        else{
        $update ="UPDATE Trabajador SET Nombre=TRIM('$Nombre'), Rut =TRIM('$Rut'),
        Telefono = TRIM('$Telefono'), Id_Cuadrilla='$ID_Cuadrilla', Estado=$tt WHERE Rut = $Rut";

        $query = mysqli_query($conexion, $update);
        header("Location: listar_trabajadores.php?error=vacio&contenido=");
        }
    }
    ?>

<!doctype html>
<html lang="en">
  <head>
    <title>Modificar Trabajador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <?php require "requires/head.php" ?>
    <?php include ("includes/conexion.php")  ?>
  </head>
<body style="background: #144255">
    <header><?php require "requires/nav.php"?></header>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Modificacion de Trabajador</h1>
            <br>
            <form action="Modificar-trabajador.php?id=<?php echo $_GET['id']?>" method="POST">
                
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rut:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="Rut"
                        placeholder="Nuevo Rut"
                        value="<?php echo $resultado['Rut'] ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Nombre Completo:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="Nombre"
                        value="<?php echo $resultado['Nombre'] ?>"
                        placeholder="Nuevo Nombre"
                        Maxlength="60" >
                        <label>Max. 60 caracteres</label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ControlSelect1">Telefono:</label>
                    <div class="col-3">
                        <input type="text" class="form-control" name="Telefono"
                        placeholder="Nuevo Telefono"
                        value="<?php echo $resultado['Telefono'] ?>">
                    </div>
                </div>

                <?php $res= $conexion->query("SELECT Id_Cuadrilla FROM Cuadrilla"); ?>
                <div>
                    <label>Id Cuadrilla:</label>
                    <select name="cuadrilla">
                        <?php
                            while($rows = $res->fetch_assoc()){
                                $id = $rows['Id_Cuadrilla'];
                                echo "<option value='$id'>$id</option>";
                            }
                        ?>
                    </select>
                    <br>
                </div>
                <div>
                    <label>Tipo trabajador: 0:administrador, 1:trabajador, 2:jefe de cuadrilla, 3:jefe de inventario</label>
                    <br>
                        <select name="tt">
                            <?php
                                $i=0;
                                while($i<=3){
                                    echo "<option value='$i'>$i</option>";
                                    $i++;
                                }
                            ?>
                        </select>
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="update">Modificar Trabajador</button>

            </form>
        </div>
    </div>
  <?php require "requires/scripts.php" ?>
  </body>
</html>