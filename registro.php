<?php
    $con = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");

    $u_alias = $_POST["u_alias"];
    $u_fechaNacimiento = $_POST["u_fechaNacimiento"];
    $u_password = $_POST["u_password"];
    $u_rol = $_POST["u_rol"];

    $statement = mysqli_prepare($con, "INSERT INTO tb_usuarios (u_alias, u_fechaNacimiento, u_password, u_rol) VALUES (?, ?, ?)");

     mysqli_stmt_bind_param($statement,'ssss', $u_alias, $u_fechaNacimiento, $u_password, $u_rol);
     mysqli_stmt_execute($statement);

     $response = array();
     $response["success"] = true;

     echo json_encode($response);

?>