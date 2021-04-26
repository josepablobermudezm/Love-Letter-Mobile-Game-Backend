<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = false;
   
   $u_alias = $_POST["u_alias"];
   $u_password = $_POST["u_password"];
   
   $statement = mysqli_prepare($mysqli, "SELECT * FROM tb_usuarios WHERE u_alias = ? AND u_password = ?");
   mysqli_stmt_bind_param($statement,'ss', $u_alias, $u_password);

   $statement->execute();
   mysqli_stmt_store_result($statement);
   $statement->bind_result($u_id, $u_alias, $u_password,$u_rol, $u_picture, $u_fechaNacimiento, $u_cantidadPartidasJugadas, $u_cantidadPartidasGanadas, $u_cantidadAmigos, $u_nivel, $u_experiencia);
   
   while(mysqli_stmt_fetch($statement)){
      $response["u_id"] = $u_id;
      $response["u_alias"] = $u_alias;
      $response["u_password"] = $u_password;
      $response["u_rol"] = $u_rol;
      $response["u_picture"] = $u_picture;
      $response["u_fechaNacimiento"] = $u_fechaNacimiento;
      $response["u_cantidadPartidasJugadas"] = $u_cantidadPartidasJugadas;
      $response["u_cantidadPartidasGanadas"] = $u_cantidadPartidasGanadas;
      $response["u_cantidadAmigos"] = $u_cantidadAmigos;
      $response["u_nivel"] = $u_nivel;
      $response["u_experiencia"] = $u_experiencia;
      $response["success"] = true;
   };
   
   $mysqli->close();
   echo json_encode($response);
?>