<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;
   $p_id = intval($_POST["p_id"]);
   $p_cantidadJugadores = intval($_POST["p_cantidadJugadores"]);
   $p_tipo = $_POST["p_tipo"];
   $p_codigo = $_POST["p_codigo"];
   $p_nivelMinimo = intval($_POST["p_nivelMinimo"]);
   $p_fkUsuario = intval($_POST["p_fkUsuario"]);

   $statement = mysqli_prepare($mysqli, "UPDATE tb_partida SET p_cantidadJugadores = ?, p_tipo = ?, p_codigo = ?, 
   p_nivelMinimo = ?, p_fkUsuario = ? WHERE p_id = ?");

   mysqli_stmt_bind_param($statement,'issiii', $p_cantidadJugadores, $p_tipo, $p_codigo, $p_nivelMinimo, $p_fkUsuario, $p_id);

   if(!mysqli_stmt_execute($statement)){
      $response["success"] = false;
   };
   $mysqli->close();
   echo json_encode($response);
?>