<?php
   $mysqli = mysqli_connect("fdb20.awardspace.net", "3363332_bdwinadate", "180120Jr@!", "3363332_bdwinadate");
   $query = "SELECT * FROM tb_usuarios";
   $results = array();
   $results["success"] = false;
   
   if ($result = $mysqli->query($query)) {
      $results["success"] = true;
      while ($row = $result->fetch_assoc()) {
            $results['usuarios'][] = $row;
      }
      $result->free();
   }
   
   $mysqli->close();
   echo json_encode($results);
?>