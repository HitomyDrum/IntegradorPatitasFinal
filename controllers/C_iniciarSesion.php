<?php

    require('../models/Conexion.php');

    $correo = $_POST["email"];
    $pass = $_POST["password"];

    function iniciarSesionUser($correo, $pass) {

        $con = new Conexion();

    
        $consulta = "SELECT * FROM clientes WHERE EMAIL_CLI='$correo' and PASS_CLI = '$pass'";
        $result = $con->con->query($consulta);

        # Registrar session de usuario
        if ($result->num_rows > 0) {
            $infoLogin = "Inicio sesion con éxito";
            while ($row = $result->fetch_assoc()) {
                $_SESSION['DNI_CLI'] = $row["DNI_CLI"]; 
                $_SESSION['NOM_CLI'] = $row["NOM_CLI"]; # Registrar session
            }
            
        } else $infoLogin = "No existe el cliente";


        return $infoLogin;
    }

    $inicioSesion = iniciarSesionUser($correo, $pass);
    header("Location: /Integrador/index.php");

?>