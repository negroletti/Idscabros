<?php
    //session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once("includes/conexion.php");
    include("includes/conexion.php");

    $Nombre_comuna=$_POST['comunas'];
    $sql= "SELECT comuna_id FROM comunas WHERE comuna_nombre='$Nombre_comuna'";
    $resultado=mysqli_query($conexion,$sql);
    $fila=mysqli_fetch_array($resultado);
    $ID_COMUNA=$fila["comuna_id"];
    //Pendiente
    $fecha=date('Y/m/d');
    $estadopublicacion= 'Disponible';
    $titulo=filter_var(($_POST['tituloPublicacion']),FILTER_SANITIZE_STRING);
    $categoria_ID=$_POST['categoria'];
    if(!empty($_POST['deseaDesc'])){
        $descripcion=filter_var(($_POST['descripcionPublicacion']),FILTER_SANITIZE_STRING);
        if(!empty($_POST['deseaFoto'])){
            $sql3= "INSERT INTO Publicacion(PU_Contenido,PU_FECHA,PU_NumeroReportes,PU_Titulo,PU_Ubicacion,Tg_Cod,US_Cod) values ('$descripcion','$fecha',0,'$titulo','$ID_COMUNA','$categoria_ID','$id_general')";
            $resultado3=mysqli_query($conexion,$sql3);
            if($resultado3)
            {
                $ID_Pub=mysqli_insert_id($conexion);
                foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
                    if($_FILES["archivo"]["name"][$key]){
                        $filename = $_FILES["archivo"]["name"][$key];
                        $source = $_FILES["archivo"]["tmp_name"][$key];

                        $directorio = 'docs/';
                        if(!file_exists($directorio)){
                            mkdir($directorio,0777)or die("No se puede crear el directorio de extracci&oacute;n");
                        }
                        $dir = opendir($directorio);
                        $target_path = $directorio. '/' .$filename;
                        if(move_uploaded_file($source,$target_path)){
                            $sql2="INSERT INTO Imagen(IMG_Imagen) values ('$target_path')";
                            $resultado2=mysqli_query($conexion,$sql2);
                            if($resultado2){
                                $ID_imagen=mysqli_insert_id($conexion);
                                $sql4="INSERT INTO Asociar(IMG_Cod,PU_Cod) values ('$ID_imagen','$ID_Pub')";
                                $result=mysqli_query($conexion,$sql4);
                            }
                        }else{
                            echo "Ha ocurrido un error, por favor intentelo de nuevo. <br>";
                        }
                        closedir($dir);
                    }
            }
            }
        }else{
            $sql3= "INSERT INTO Publicacion(PU_FECHA,PU_NumeroReportes,PU_Titulo,PU_Ubicacion,Tg_Cod,US_Cod) values ('$fecha',0,'$titulo','$ID_COMUNA','$categoria_ID','$id_general')";
            $resultado3=mysqli_query($conexion,$sql3);
        }
    }else if(!empty($_POST['deseaFoto'])){
        $sql3= "INSERT INTO Publicacion(PU_FECHA,PU_NumeroReportes,PU_Titulo,PU_Ubicacion,Tg_Cod,US_Cod) values ('$fecha',0,'$titulo','$ID_COMUNA','$categoria_ID','$id_general')";
        $resultado3=mysqli_query($conexion,$sql3);
        if($resultado3)
        {
            $ID_Pub=mysqli_insert_id($conexion);
            foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name){
                if($_FILES["archivo"]["name"][$key]){
                    $filename = $_FILES["archivo"]["name"][$key];
                    $source = $_FILES["archivo"]["tmp_name"][$key];
                    $directorio = 'docs/';
                    if(!file_exists($directorio)){
                        mkdir($directorio,0777)or die("No se puede crear el directorio de extracci&oacute;n");
                    }
                    $dir = opendir($directorio);
                    $target_path = $directorio. '/' .$filename;
                    if(move_uploaded_file($source,$target_path)){
                        $sql2="INSERT INTO Imagen(IMG_Imagen) values ('$target_path')";
                        $resultado2=mysqli_query($conexion,$sql2);
                        if($resultado2){
                            $ID_imagen=mysqli_insert_id($conexion);
                            $sql4="INSERT INTO Asociar(IMG_Cod,PU_Cod) values ('$ID_imagen','$ID_Pub')";
                            $result=mysqli_query($conexion,$sql4);
                        }
                    }else{
                        echo "Ha ocurrido un error, por favor intentelo de nuevo. <br>";
                    }
                    closedir($dir);
                }
        }
        }
    }
        else{
        $sql3= "INSERT INTO Publicacion(PU_FECHA,PU_NumeroReportes,PU_Titulo,PU_Ubicacion,Tg_Cod,US_Cod) values ('$fecha',0,'$titulo','$ID_COMUNA','$categoria_ID','$id_general')";
        $resultado3=mysqli_query($conexion,$sql3);
    }
?>
