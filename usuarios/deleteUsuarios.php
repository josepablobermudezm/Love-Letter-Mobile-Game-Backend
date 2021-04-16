<?php
   $mysqli = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");
   
   $response = array();
   $response["success"] = true;
   $u_id = intval($_POST["u_id"]);

   $statement = mysqli_prepare($mysqli, "DELETE FROM tb_usuarios WHERE u_id = ?");
   mysqli_stmt_bind_param($statement,'i', $u_id);
   
   if(!mysqli_stmt_execute($statement)){
      $response["success"] = false;
   };
   $mysqli->close();
   echo json_encode($response);
?>