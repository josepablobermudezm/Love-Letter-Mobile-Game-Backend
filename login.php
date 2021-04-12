<?php
    $con = mysqli_connect("localhost", "id16561754_root", "Progra4-2020", "id16561754_bd_winadate");

    $u_alias = $_POST["u_alias"];
    $u_password = $_POST["u_password"];

    $statement = mysqli_prepare($con, "SELECT * FROM tb_usuarios WHERE u_alias = ? AND u_password = ?");

     mysqli_stmt_bind_param($statement,'ss', $u_alias, $u_password);
     mysqli_stmt_execute($statement);

     mysqli_stmt_store_result($statement);
     mysqli_stmt_bind_result($statement, 'issssiiiii', $u_id, $u_alias, $u_fechaNacimiento, $u_password, $u_rol, $u_cantidadPartidasJugadas, 
     $u_cantidadPartidasGanadas, $u_cantidadAmigos, $u_nivel, $u_experiencia);

     $response = array();
     $response["success"] = true;

     while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["u_id"] = $u_id;
        $response["u_fechaNacimiento"] = $u_fechaNacimiento;
        $response["u_password"] = $u_password;
        $response["u_rol"] = $u_rol;
        $response["u_cantidadPartidasJugadas"] = $u_rol;
        $response["u_cantidadPartidasGanadas"] = $u_rol;
        $response["u_cantidadAmigos"] = $u_rol;
        $response["u_nivel"] = $u_rol;
        $response["u_experiencia"] = $u_rol;
     }

     echo json_encode($response);

?>