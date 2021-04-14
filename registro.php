<?php
   $mysqli = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");

   $u_alias = $_POST["u_alias"];
   $u_fechaNacimiento = $_POST["u_fechaNacimiento"];
   $u_password = $_POST["u_password"];
   $u_rol = $_POST["u_rol"];
   $u_cantidadPartidasJugadas = $_POST["u_cantidadPartidasJugadas"];
   $u_cantidadPartidasGanadas = $_POST["u_cantidadPartidasGanadas"];
   $u_cantidadAmigos = $_POST["u_cantidadAmigos"];
   $u_nivel = $_POST["u_nivel"];
   $u_experiencia = $_POST["u_experiencia"];

   $statement = mysqli_prepare($mysqli, 
      "INSERT INTO tb_usuarios (u_alias, u_fechaNacimiento, u_password, u_rol, 
      u_cantidadPartidasJugadas, u_cantidadPartidasGanadas, u_cantidadAmigos, u_nivel, u_experiencia) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

   mysqli_stmt_bind_param($statement,'ssssiiiii', $u_alias, $u_fechaNacimiento, $u_password, $u_rol, 
      $u_cantidadPartidasJugadas, $u_cantidadPartidasGanadas, $u_cantidadAmigos, $u_nivel, $u_experiencia);
   mysqli_stmt_execute($statement);

   $response = array();
   $response["success"] = true;

   $mysqli->close();
   echo json_encode($response);
?>