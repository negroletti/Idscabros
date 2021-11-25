
<?php 
    session_start();
    include 'includes/conexion.php'; 

    //variables a medir
    $variable1= strlen($_POST['Nameproyect']);
    $variable3= trim($_POST['Nameproyect']);
    $variable2= strlen($_POST['Descripcionpro']);
    $variable4=$_POST['Descripcionpro'];
    $contador=0;
    
    //ini de variables con algunas restricciones
    if($variable1<=30 && !empty($variable3))//nombre proyecto
    {
        if(!preg_match("/[\W]+/", $variable3))
        {
            $Nameproyect = $variable3;
        }else{
            $contador=1;
            header('Location: Agregar_Proyecto.php?error=nonombre&contenido=Requiere nombre proyecto o ingreso un caracter special');
            exit();
        }  
    }else{
        echo " fallo a guardar proyecto ";
        $contador=1;
        header('Location: Agregar_Proyecto.php?error=nonombre&contenido=Requiere nombre proyecto o ingreso un caracter special');
        exit();
    } 
    
    if($_POST['idtipo']>0 && $_POST['idtipo']<7){//id tipo
        $idtipo = $_POST['idtipo'];
    }else{
        $contador=1;
        header('Location: Agregar_Proyecto.php?error=tipo&contenido=Tipo requiere un valor del 1 al 6');
        exit();
    }

    $cuadrilla = $_POST['cuadrilla'];
    $UsandoInventario = $_POST['UsandoInventario'];

    if($variable2<=255 && !empty($variable4))//descripcion proyecto
    {
        if(!preg_match("/[\W]+/", $variable4))
        {
            $Descripcionpro = $variable4;
        }else{
            $contador=1;
            header('Location: Agregar_Proyecto.php?error=nodesc&contenido=Requiere descripcion o ingreso un caracter special');
            exit();
        }
    }else{
        $contador=1;
        header('Location: Agregar_Proyecto.php?error=nodesc&contenido=Requiere descripcion o ingreso un caracter special');
        exit();
    }
    //fecha inicio y termino
    trim($FechaInicio = $_POST['FechaInicio']);
    trim($FechaTermino = $_POST['FechaTermino']);

    if($FechaTermino<=$FechaInicio){
        $contador=1;
        header('Location: Agregar_Proyecto.php?error=wrongdate&contenido=La fecha de termino debe ser superior a la de inicio');
        exit();
    }
    $select = "SELECT MAX(Id_Proyecto) as A FROM Proyecto";
    $query = mysqli_query($conexion,$select);
    $row= mysqli_fetch_assoc($query);
    $lastid=$row['A'];
    //Inserción a la bd
    if($contador==0){
        $insert = "INSERT INTO Proyecto(Nombre_Proyecto, Descripcion_Proyecto, Fecha_Inicio_Proyecto, Fecha_Fin_Proyecto, Id_Tipo, Id_Cuadrilla, Id_Inventario, Id_Proyecto) VALUES 
        ('$Nameproyect','$Descripcionpro','$FechaInicio','$FechaTermino', $idtipo, $cuadrilla,$UsandoInventario, $lastid+1)";
        $resultado = $conexion->query($insert); 
        if($resultado==1){
            header('Location: Agregar_Proyecto.php?error=agregado&contenido=proyecto agregado');
        }
    }else{
        header('Location: Agregar_Proyecto.php?error=error&contenido=proyecto no agregado');
    }
    
    
    
?>
