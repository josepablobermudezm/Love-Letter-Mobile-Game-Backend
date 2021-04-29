<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;
   $p_cantidadJugadores = intval($_POST["p_cantidadJugadores"]);
   $p_tipo = $_POST["p_tipo"];
   $p_codigo = $_POST["p_codigo"];
   $p_nivelMinimo = intval($_POST["p_nivelMinimo"]);
   $p_fkUsuario = intval($_POST["p_fkUsuario"]);

   $statement = mysqli_prepare($mysqli, "INSERT INTO tb_partida (p_cantidadJugadores, p_tipo, p_codigo, 
   p_nivelMinimo, p_fkUsuario) VALUES (?, ?, ?, ?, ?)");

   mysqli_stmt_bind_param($statement,'issii', $p_cantidadJugadores, $p_tipo, $p_codigo, $p_nivelMinimo, $p_fkUsuario);
   if(!$statement->execute()){
      $response["success"] = false;
   };

   $mysqli->close();
   echo json_encode($response);
?>