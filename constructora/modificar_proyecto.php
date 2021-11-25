<?php
    include ("includes/conexion.php");

    $codigo = $_GET['id'];

    $sql = "SELECT * FROM Proyecto WHERE Id_Proyecto ='$codigo'";
    $resultado = $conexion->query($sql);
    $resultado = $resultado->fetch_assoc();


    if(isset($_GET['id'])){
        $id_proyecto = $_GET['id'];
        $query = "SELECT * FROM Proyecto Where Id_Proyecto ='$id_proyecto'";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) ==1){
            $row = mysqli_fetch_array($result);
            $nombre_proyecto = $row['Nombre_Proyecto'];
            $descripcion_proyecto = $row['Descripcion_Proyecto'];
            $fecha_inicio_proyecto = $row['Fecha_Inicio_Proyecto'];
            $fecha_fin_proyecto = $row['Fecha_Fin_Proyecto'];
        }
        else{
            $_SESSION['message']='Este proyecto no existe';
            header("Location: index.php");
        }
    }
    if(isset($_POST['update'])){
        trim($id_proyecto = $_GET['id']);
        trim($nombre_proyecto = $_POST['Nombre_Proyecto']);
        trim($descripcion_proyecto = $_POST['Descripcion_Proyecto']);
        trim($fecha_inicio_proyecto = $_POST['Fecha_Inicio_Proyecto']);
        trim($fecha_fin_proyecto = $_POST['Fecha_Fin_Proyecto']);
        trim($Id_Inventario = $_POST['inventario']);
        if($fecha_fin_proyecto<=$fecha_inicio_proyecto){
            header('Location: lista_proyectos.php?error=wrongdate&contenido=La fecha de fin del proyecto debe ser superior a la de inicio');
            exit();
        }
        if(empty ($id_proyecto) || empty($nombre_proyecto) || empty($descripcion_proyecto) || empty($fecha_inicio_proyecto) || empty($fecha_fin_proyecto)){
            header("Location: lista_proyectos.php?error=incompleta&contenido=DEBE ingresar todos los nuevos datos");
        }
        else{
        $query ="UPDATE Proyecto SET Nombre_Proyecto=TRIM('$nombre_proyecto'), Descripcion_Proyecto =TRIM('$descripcion_proyecto'),
        Fecha_Inicio_Proyecto = TRIM('$fecha_inicio_proyecto'), Fecha_Fin_Proyecto=TRIM('$fecha_fin_proyecto'), Id_Inventario=TRIM('$Id_Inventario') WHERE Id_Proyecto = $id_proyecto";

        mysqli_query($conexion, $query);
        header("Location: lista_proyectos.php?error=vacio&contenido=Proyecto modificado con exito");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proyecto</title>
    <?php require "requires/head.php" ?>
</head>
<body style="background: #144255">
    <header><?php require "requires/nav.php" ?></header>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card card-body">
                            
                            <form action="modificar_proyecto.php?id=<?php echo $_GET['id']?>" method="POST">

                                <div class="form-group">
                                    <input type="text" name="Nombre_Proyecto"
                                    class="form-control" placeholder="Nuevo Nombre de Proyecto"
                                    value="<?php echo $resultado['Nombre_Proyecto'] ?>"
                                    Maxlength="30">
                                    <label>Máx 30 caracteres.</label>
                                </div>

                                <div class="form-group">
                                    <textarea name="Descripcion_Proyecto"
                                    class = "form-control" placeholder="Nueva Descripcion"
                                    Maxlength="255"><?php echo $resultado['Descripcion_Proyecto'] ?></textarea>
                                    <label>Máx 255 caracteres.</label>
                                </div>

                                <div class="form-group">
                                    <input type="date" name="Fecha_Inicio_Proyecto" 
                                    class = "form-control" placeholder="Nueva fecha de inicio"
                                    value="<?php echo $resultado['Fecha_Inicio_Proyecto'] ?>">
                                </div>
                                
                                <div class="form-group">
                                    <input type="date" name="Fecha_Fin_Proyecto"
                                    class = "form-control" placeholder="Nueva fecha de fin"
                                    value="<?php echo $resultado['Fecha_Fin_Proyecto'] ?>">
                                </div>

                                <?php $res= $conexion->query("SELECT Id_Inventario FROM Inventario"); ?>
                                <div>
                                    <label>Id inventario:</label>
                                    <select name="inventario">
                                        <?php
                                            while($rows = $res->fetch_assoc()){
                                                $id = $rows['Id_Inventario'];
                                                echo "<option value='$id'>$id</option>";
                                            }
                                        ?>
                                    </select>
                                    <br>
                                </div>
                                <br>
                                
                                <button class="btn btn-success" name="update">Modificar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "requires/scripts.php" ?>
</body>
</html>
