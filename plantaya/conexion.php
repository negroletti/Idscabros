<?php 
function ConectarBD(){
    $enlace = mysqli_connect('146.83.194.142','grup2e','isw20202e', 'g2sw');
    if (!$enlace){
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    
    mysqli_close($enlace);
     }
?>
