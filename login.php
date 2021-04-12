<?php
    $con = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");

    $u_alias = $_POST["u_alias"];
    $u_password = $_POST["u_password"];

    $statement = mysqli_prepare($con, "SELECT * FROM tb_usuarios WHERE u_alias = ? AND u_password = ?");

     mysqli_stmt_bind_param($statement,'ss', $u_alias, $u_password);
     mysqli_stmt_execute($statement);

     mysqli_stmt_store_result($statement);
     mysqli_stmt_bind_result($statement,'ssss', $u_id,$u_alias, $u_password, $u_rol);

     $response = array();
     $response["success"] = true;

     while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["u_id"] = $u_id;
        $response["u_alias"] = $u_alias;
        $response["u_password"] = $u_password;
        $response["u_rol"] = $u_rol;
     }

     echo json_encode($response);

?>