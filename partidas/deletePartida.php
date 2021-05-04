<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   
   $response = array();
   $response["success"] = true;
   $p_id = intval($_POST["p_id"]);

   $statement = mysqli_prepare($mysqli, "DELETE FROM tb_partida WHERE p_id = ?");
   mysqli_stmt_bind_param($statement,'i', $p_id);
   
   if(!mysqli_stmt_execute($statement)){
      $response["success"] = false;
   };
   $mysqli->close();
   echo json_encode($response);
?>