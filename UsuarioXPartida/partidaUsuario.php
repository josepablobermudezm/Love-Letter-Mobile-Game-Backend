<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;
   $pu_fkUsuario = intval($_POST["pu_fkUsuario"]);
   $pu_fkPartida = intval($_POST["pu_fkPartida"]);

   $statement = mysqli_prepare($mysqli, "INSERT INTO tb_partida_usuario (pu_fkUsuario, pu_fkPartida) VALUES (?, ?)");

   mysqli_stmt_bind_param($statement,'ii', $pu_fkUsuario, $pu_fkPartida);
   if(!$statement->execute()){
      $response["success"] = false;
   };

   $mysqli->close();
   echo json_encode($response);
?>