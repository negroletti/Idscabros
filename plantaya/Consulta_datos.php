<?php

  include("includes/connection.php");

/*
  if(isset($_POST['save_id'])){
    $id = $_POST['id'];

    $query = "SELECT U.US_Nombre,D.DU_Numero,D.DU_Whatsapp,D.DU_Correo1,U.US_COD,
    COUNT(U.US_Cod) AS CP,P.PU_Titulo,DU_REGION,DU_COMUNA,A.AV_IMG
    FROM DATOS_USUARIOS D
    RIGHT JOIN Avatar A ON A.DU_Cod = D.DU_COD
    RIGHT JOIN Usuario U ON U.DU_Cod=D.DU_Cod
    RIGHT JOIN Publicacion P ON P.US_Cod=U.US_Cod
    WHERE U.US_Cod='$id'
    GROUP BY U.US_Nombre,D.DU_Numero,D.DU_Whatsapp,D.DU_Correo1,U.US_COD,P.PU_Titulo,DU_REGION,DU_COMUNA,A.AV_IMG;";

    $query_publicaiones = "SELECT U.US_COD,P.PU_Titulo
    FROM DATOS_USUARIOS D
    RIGHT JOIN Usuario U ON U.DU_Cod=D.DU_Cod
    RIGHT JOIN Publicacion P ON P.US_Cod=U.US_Cod
    WHERE U.US_Cod='$id';";

    $result = mysqli_query($conexion,$query);
    $result_publicaciones = mysqli_query($conexion,$query_publicaiones);

    if(!$result){
      echo "query failed";
    }else{

      $publicaciones = array();
      $count=0;
      while ($row_publicaciones = mysqli_fetch_array($result_publicaciones)) {

        if(isset($row_publicaciones['PU_Titulo'])){
          $publicaciones[$count] = $row_publicaciones['PU_Titulo'];
          $count++;
        }
      }

      $row = mysqli_fetch_array($result);

      $cp = $row['CP'];
      $region = $row['DU_REGION'];
      $comuna = $row['DU_COMUNA'];
      $nombre = $row['US_Nombre'];
      $telefono = $row['DU_Numero'];
      $whatsapp = $row['DU_Whatsapp'];
      $correo = $row['DU_Correo1'];


      if($row['AV_IMG']== null){

        $url = "imagenes/perfil foto.jpg";
      }else{
        $url = $row['AV_IMG'];
      }
    }
    header("location: index.php");
  }
*/
  $query = "SELECT U.US_Nombre,D.DU_Numero,D.DU_Whatsapp,D.DU_Correo1,U.US_COD,
  COUNT(U.US_Cod) AS CP,P.PU_Titulo,DU_REGION,DU_COMUNA,A.AV_IMG
  FROM DATOS_USUARIOS D
  RIGHT JOIN Avatar A ON A.DU_Cod = D.DU_COD
  RIGHT JOIN Usuario U ON U.DU_Cod=D.DU_Cod
  RIGHT JOIN Publicacion P ON P.US_Cod=U.US_Cod
  WHERE U.US_Cod=1
  GROUP BY U.US_Nombre,D.DU_Numero,D.DU_Whatsapp,D.DU_Correo1,U.US_COD,P.PU_Titulo,DU_REGION,DU_COMUNA,A.AV_IMG;";

  $query_publicaiones = "SELECT U.US_COD,P.PU_Titulo
  FROM DATOS_USUARIOS D
  RIGHT JOIN Usuario U ON U.DU_Cod=D.DU_Cod
  RIGHT JOIN Publicacion P ON P.US_Cod=U.US_Cod
  WHERE U.US_Cod=1;";

  $result = mysqli_query($conexion,$query);
  $result_publicaciones = mysqli_query($conexion,$query_publicaiones);

  if(!$result){
    echo "query failed";
  }else{

    $publicaciones = array();
    $count=0;
    while ($row_publicaciones = mysqli_fetch_array($result_publicaciones)) {

      if(isset($row_publicaciones['PU_Titulo'])){
        $publicaciones[$count] = $row_publicaciones['PU_Titulo'];
        $count++;
      }
    }

    $row = mysqli_fetch_array($result);

    $id = 1;
    $cp = $row['CP'];
    $region = $row['DU_REGION'];
    $comuna = $row['DU_COMUNA'];
    $nombre = $row['US_Nombre'];
    $telefono = $row['DU_Numero'];
    $whatsapp = $row['DU_Whatsapp'];
    $correo = $row['DU_Correo1'];

    if($row['AV_IMG']== null){

      $url = "imagenes/perfil foto.jpg";
    }else{
      $url = $row['AV_IMG'];
    }
  }



?>
