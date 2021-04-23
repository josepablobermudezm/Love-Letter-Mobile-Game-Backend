<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;
   $u_id = intval($_POST["u_id"]);
   $u_alias = $_POST["u_alias"];
   $u_password = $_POST["u_password"];
   $u_rol = $_POST["u_rol"];
   $u_picture = $_POST["u_picture"];
   $u_fechaNacimiento = $_POST["u_fechaNacimiento"];
   $u_cantidadPartidasJugadas = intval($_POST["u_cantidadPartidasJugadas"]);
   $u_cantidadPartidasGanadas = intval($_POST["u_cantidadPartidasGanadas"]);
   $u_cantidadAmigos = intval($_POST["u_cantidadAmigos"]);
   $u_nivel = intval($_POST["u_nivel"]);
   $u_experiencia = intval($_POST["u_experiencia"]);

   $statement = mysqli_prepare($mysqli, "UPDATE tb_usuarios SET u_alias = ?, u_password = ?, u_rol = ?, u_picture = ?,
      u_fechaNacimiento = ?, u_cantidadPartidasJugadas = ?, u_cantidadPartidasGanadas = ?, u_cantidadAmigos = ?, u_nivel = ?,
      u_experiencia = ? WHERE u_id = ?");
   mysqli_stmt_bind_param($statement,'sssssiiiiii', $u_alias, $u_password, $u_rol, $u_picture, $u_fechaNacimiento, 
   $u_cantidadPartidasJugadas, $u_cantidadPartidasGanadas, $u_cantidadAmigos, $u_nivel, $u_experiencia, $u_id);
   
   if(!mysqli_stmt_execute($statement)){
      $response["success"] = false;
   };
   $mysqli->close();
   echo json_encode($response);
?>