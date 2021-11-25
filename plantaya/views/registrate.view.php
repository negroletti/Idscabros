<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="./Ubicacion.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/estilos.css">
    <title>Registrate</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="titulo">Registrate</h1>
        <img src="img/Hoja.png" width="500px"/>
        <hr class="border">

        <form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div> 

            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="nombre" class="nombre" placeholder="Nombre">
            </div> 
    
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="apellido" class="apellido" placeholder="Apellido">
            </div>      

            <div class="form-group">
            <i class="icono izquierda fa fa-envelope-o" aria-hidden="true"></i><input type="email" name="correo" class="correo" placeholder="Correo">
            </div> 

            <div class="form-group">
            <i class="icono izquierda fa fa-mobile" aria-hidden="true"></i><input type="number" name="telefono" class="telefono" placeholder="Telefono">
            </div>

            <div class="form-group">
			<i class="icono izquierda fa fa-map-marker" aria-hidden="true"></i><select class="usuario" type="text" name="nombrereg" id="regiones"></select>
			</div>

			<div class="form-group">
			<i class="icono izquierda fa fa-map-marker" aria-hidden="true"></i><select class="usuario" name="nombrecom" type="text" id="comunas"></select>	
			</div>

            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password" class="password" placeholder="Contraseña">
            </div>

            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña"><i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>


			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul color='red'>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
        </form>
    

		<p class="texto-registrate">
			¿ Ya tienes cuenta ?
			<a href="index.php">Iniciar Sesión</a>
		</p>
    </div>
    



</body>
</html>