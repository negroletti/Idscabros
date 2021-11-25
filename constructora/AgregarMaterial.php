<?php 

    $conexion = new mysqli('146.83.194.142', 'rcarvajal','r3476carvajal', 'rcbd');

    $DescripcionMaterial=$_POST['DescripcionMaterial'];
    $CantidadComprada=$_POST['CantidadComprada'];
    $PrecioMaterial=$_POST['PrecioMaterial'];
    $Inventario=$_POST['Inventario'];

    //Inserción a la bd
    $select="SELECT Descripcion_Material as dm FROM Material WHERE Descripcion_Material='$DescripcionMaterial'";
    $query=mysqli_query($conexion,$select);
    $row=mysqli_fetch_assoc($query);
    $material = $row['dm'];
    if($material==$DescripcionMaterial){
        $update = "UPDATE Material SET Cantidad=Cantidad+$CantidadComprada";
        $query = mysqli_query($conexion,$update);
        $update = "UPDATE Esta SET Cantidad_actual=Cantidad_actual+$CantidadComprada";
        $query = mysqli_query($conexion,$update);
        header("Location: Agregar_material.php?error=creado&contenido= Cantidad total actualizada");
    }else{
        $select ="SELECT MAX(Id_Material) as A FROM Material";
        $query=mysqli_query($conexion,$select);
        $rows = mysqli_fetch_assoc($query);
        $lastid = $rows['A'];
        $nextid = $lastid+1;
        $insert = "INSERT INTO Material(Id_Material, Descripcion_Material, Cantidad, Precio) VALUES ($nextid,'$DescripcionMaterial','$CantidadComprada',$PrecioMaterial)";
        $resultado = $conexion->query($insert); 
        if($resultado==1){
            $insert = "INSERT INTO Esta(Id_Inventario, Id_Material, Cantidad_asignada, Cantidad_actual) VALUES ('$Inventario','$nextid','$CantidadComprada','$CantidadComprada')";
            $resultado=$conexion->query($insert);
            if($resultado==1){
                header('Location: Agregar_material.php?error=creado&contenido=Material agregado');
            }else{
                header("Location: Agregar_material.php?error=trab&contenido= Fallo al agregar material");
            }
        }else{
            header("Location: Agregar_material.php?error=trab&contenido= Material no agregado");
        }
    }
?>
