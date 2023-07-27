<?php

    //session_start();
    //session_destroy();
    session_start();

    require('../models/Conexion.php');

    $user = $_POST["user"];
    $pass = $_POST["password"];

    function iniciarSesionUser($user, $pass) {

        $con = new Conexion();
    
        $consulta = "SELECT * FROM admin WHERE ID_ADM='$user' and PASS_ADM='$pass'";
        $result = $con->con->query($consulta);

        # Registrar session de usuario
        if ($result->num_rows > 0) {
            $infoLogin = "Inicio sesion con éxito";
            while ($row = $result->fetch_assoc()) {
                $_SESSION['NAME_ADMIN'] = $row["NAME_ADMIN"];
            }
            
        } else $infoLogin = "No existe el cliente";

        return $infoLogin;
    }

    $inicioSesion = iniciarSesionUser($user, $pass);
    # echo $inicioSesion;
    header("Location: /Integrador/views/profile/V_PerfilAdminDoc.php");

?>