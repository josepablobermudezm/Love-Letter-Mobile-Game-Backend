<?php
   $mysqli = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");
   $query = "SELECT * FROM tb_usuarios";
   $results = array();
   $response["success"] = false;
   
   if ($result = $mysqli->query($query)) {
      $results["success"] = true;
      while ($row = $result->fetch_assoc()) {
            $results[] = $row;
      }
      $result->free();
   }
   
   $mysqli->close();
   echo json_encode($results);
?>