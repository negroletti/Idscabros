<?php

    session_start();
    include ("includes/conexion.php");
    $codigo = $_GET['Id_Material']; 
    $sql = "SELECT * FROM Material WHERE Id_Material ='$codigo'";
    $resultado = $conexion->query($sql);
    $resultado = $resultado->fetch_assoc();
    if(isset($_GET['Id_Material'])){
        $Id_Material = $_GET['Id_Material'];
        $query = "SELECT * FROM Material WHERE Id_Material ='$Id_Material'";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result) ==1){
            $row = mysqli_fetch_array($result);
            $Descripcion_Material = $row['Descripcion_Material'];
            $Cantidad = $row['Cantidad'];
            $Precio = $row['Precio'];
        }
        else{
            $_SESSION['message']='Este material no existe';
            header("Location: ModificarMaterial.php");
        }
    }
    if(isset($_POST['owo'])){
        
        trim($Descripcion_Material = $_POST['Descripcion_Material']);
        trim($Cantidad = $_POST['Cantidad']);
        trim($Precio = $_POST['Precio']);
        if(empty ($Descripcion_Material) || empty($Cantidad) || empty($Precio)){
            header("Location: Inventario.php?error=trab&contenido=DEBE ingresar todos los nuevos datos");
        }
        else{
            $update ="UPDATE Material SET Descripcion_Material=TRIM('$Descripcion_Material'), Cantidad =TRIM('$Cantidad'), Precio = TRIM('$Precio') WHERE Id_Material = '$codigo'";
            $query= mysqli_query($conexion, $update);
            if($query==1){
                header("Location: Inventario.php?error=creado&contenido= Material modificado con exito");
            }else{
                header("Location: Inventario.php?error=trab&contenido=Material no modificado.");
            }
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
    <header>
        <?php
        
        if($_SESSION['estado']== 0){// admin
        require "requires/nav.php";
        }
        
        if($_SESSION['estado']==1){//trabajadores
        require "requires/nav_trabajador.php";
        }
        
        if($_SESSION['estado']==2){//jefe de cuadrilla
        require "requires/nav_jefe.php";
        }
        if($_SESSION['estado']==3){// jefe inventario
        require "requires/nav_inventario.php";
        }


    
        ?>
        
    </header>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-4 mx-auto">
                        <div class="card card-body">
                            
                            <form action="ModificarMaterial.php?Id_Material=<?php echo $codigo?>" method="POST">
                                <div class="form-group">
                                    <textarea name="Descripcion_Material" class = "form-control" 
                                    placeholder="Descripcion_Material" Maxlength="255"><?php echo $resultado['Descripcion_Material'] ?></textarea>
                                    <label>Máx 255 caracteres.</label>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="Cantidad" class="form-control" 
                                    placeholder="Nuevo Cantidad" value="<?php echo $resultado['Cantidad'] ?>" >
                                </div>
                                <div class="form-group">
                                    <input type="number" name="Precio" class = "form-control" placeholder="Nueva Precio"
                                    value="<?php echo $resultado['Precio'] ?>">
                                </div>
                                <button class="btn btn-success" name="owo">Modificar</button>
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
