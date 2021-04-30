<?php
    $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");

    $results = array();
    $results["success"] = false;

    $p_id = intval($_POST["p_id"]);
    $query = "SELECT * FROM tb_usuarios JOIN 
                tb_partida_usuario ON tb_usuarios.u_id = tb_partida_usuario.pu_fkUsuario 
                WHERE tb_partida_usuario.pu_fkPartida = {$p_id}";
                
   if ($result = $mysqli->query($query)) {
      $results["success"] = true;
      while ($row = $result->fetch_assoc()) {
            $results['Usuarios'][] = $row;
      }
      $result->free();
   }
   
   $mysqli->close();
   echo json_encode($results);
?>