<?php
session_start();

if (isset($_SESSION['usuario'])) {
	header('Location: publicacion.php');
	die();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario= filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
    $nombre= filter_var($_POST['nombre'],FILTER_SANITIZE_STRING);
    $apellido= filter_var($_POST['apellido'],FILTER_SANITIZE_STRING);
    $correo= $_POST['correo'];
    $telefono= $_POST['telefono'];
    $region = $_POST['nombrereg'];
    $comuna= $_POST['nombrecom'];
    $password= $_POST['password'];
    $password2 = $_POST['password2'];

    

    $errores = '';

    if (empty($usuario) or empty($nombre) or empty($apellido) or empty($correo) or empty($telefono) or empty($region) or empty($comuna) or empty($password) or empty($password2)) {
		$errores = '<li>Por favor rellena todos los datos correctamente</li>';
	} else{
        try {
			$conexion = new PDO('mysql:host=146.83.198.35;dbname=G2Gproyecto_bd', 'G2Gproyecto', 'G2Gproyecto2021');
		} catch (PDOException $e) {
			echo "Error:" . $e->getMessage();
		}

		$statement = $conexion->prepare('SELECT * FROM Usuario WHERE US_Nombre = :US_Nombre LIMIT 1');
		$statement->execute(array(':US_Nombre' => $usuario));

        $resultado = $statement->fetch();

        if ($resultado != false) {
			$errores .= '<li>El nombre de usuario ya existe</li>';
		}
        if ($password != $password2) {
			$errores.= '<li>Las contraseñas no son iguales</li>';
		}

    }   
    if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO Usuario (US_Cod, US_Nombre, US_Contrasena, US_Estado, RN_Cod,US_NombreREAL,US_Apelido,US_Numero,US_Comuna,US_Region,US_Avatar,US_Correo) VALUES (null, :US_Nombre, :US_Contrasena,"Valido",2,:US_NombreREAL,:US_Apelido,:US_Numero,:US_Comuna,:US_Region,null,:US_Correo)');
		$statement->execute(array(
        'US_Nombre' => $usuario,
        'US_Contrasena' => $password,
        'US_NombreREAL' => $nombre,
        'US_Apelido' => $apellido,
        'US_Numero' => $telefono,
        'US_Comuna' => $comuna,
        'US_Region' => $region,
        'US_Correo' => $correo
	
			));
    

		
		header('Location: index.php');
	}



}



require 'views/registrate.view.php';

?>