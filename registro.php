<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;

   $u_alias = $_POST["u_alias"];
   $u_fechaNacimiento = $_POST["u_fechaNacimiento"];
   $u_password = $_POST["u_password"];
   $u_rol = $_POST["u_rol"];
   $u_cantidadPartidasJugadas = $_POST["u_cantidadPartidasJugadas"];
   $u_cantidadPartidasGanadas = $_POST["u_cantidadPartidasGanadas"];
   $u_cantidadAmigos = $_POST["u_cantidadAmigos"];
   $u_nivel = $_POST["u_nivel"];
   $u_experiencia = $_POST["u_experiencia"];

   //Procederemos a hacer una consulta que buscara el alias del usuario
   $buscarAlias = "SELECT * from tb_usuarios WHERE u_alias='$u_alias'";
   $resultado = $mysqli->query($buscarAlias);
   $cantidadFilas = mysqli_num_rows($resultado);
   if($cantidadFilas == 1) {
      $response["success"] = false;
   }

   $statement = mysqli_prepare($mysqli, 
      "INSERT INTO tb_usuarios (u_alias, u_fechaNacimiento, u_password, u_rol, 
      u_cantidadPartidasJugadas, u_cantidadPartidasGanadas, u_cantidadAmigos, u_nivel, u_experiencia) 
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

   mysqli_stmt_bind_param($statement,'ssssiiiii', $u_alias, $u_fechaNacimiento, $u_password, $u_rol, 
      $u_cantidadPartidasJugadas, $u_cantidadPartidasGanadas, $u_cantidadAmigos, $u_nivel, $u_experiencia);
   if(!$statement->execute()){
      $response["success"] = false;
   };

   $mysqli->close();
   echo json_encode($response);
?>