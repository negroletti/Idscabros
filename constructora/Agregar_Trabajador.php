<?php 

    session_start();
    include 'includes/conexion.php'; 

    function valida_rut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;
    
            $suma += $v * $i;
            ++$i;
        }
    
        $dvr = 11 - ($suma % 11);
        
        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';
    
        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

    //Variables a agregar
    $cuadrilla = $_POST['cuadrilla'];

    //restricciones
    if(!empty($_POST['Nametrab']))//nombre
    {
        $Nametrab = $_POST['Nametrab'];
    }else{
        header('Location: AgregarTrabajador.php?error=Nametrab&contenido=Nombre Erroneo');
        exit();
    } 

    if(!empty($_POST['Teleftrab']) && $_POST['Teleftrab']<100000000 )//telefono
    {
        $Teleftrab = $_POST['Teleftrab'];
    }else{
        header('Location: AgregarTrabajador.php?error=Teleftrab&contenido=Telefono Erroneo');
        exit();
    } 

    if(valida_rut($_POST['ruttrab']))//rut
    {
        $ruttrab = $_POST['ruttrab'];
    }else{
        header('Location: AgregarTrabajador.php?error=ruttrab&contenido=Rut Erroneo');
        exit();
    } 
    

    //Inserción a la bd

    $insert = "INSERT INTO Trabajador(Rut,Nombre,Telefono,Id_Cuadrilla) VALUES ('$ruttrab','$Nametrab',$Teleftrab,$cuadrilla)";
    $resultado = $conexion->query($insert);
    if($resultado==1){
        header('Location: AgregarTrabajador.php?error=agregado&contenido=Trabajador agregado');
    }else{
        header('Location: AgregarTrabajador.php?error=error&contenido=Trabajador no agregado');
    }
?>