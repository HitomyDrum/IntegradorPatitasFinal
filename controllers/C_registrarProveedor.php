<?php

    require_once('../models/Conexion.php');

    $ruc = $_POST["ruc"];
    $razon_social = $_POST["razon_social"];
    $nombre_comercial = $_POST["nombre_comercial"];
    $fecha_inicial = $_POST["fecha_inicial"];
    $departamento = $_POST["departamento"];
    $direccion_legal = $_POST["direccion_legal"];

    $con = new Conexion();

    try {
        $queryTxt = "INSERT INTO `proveedores` (`RUC`, `NOMBRE_COMERCIAL`, `RAZON_SOCIAL`, `DIR_LEGAL`, `DEPARTAMENTO`, `FECH_PROV`) VALUES ('$ruc', '$nombre_comercial', '$razon_social', '$direccion_legal', '$departamento', '$fecha_inicial');";
        $query = $con->con->query($queryTxt);

        if ($query) {
            $mensaje_error = "El registro se ha insertado correctamente.";
        } else {
            $mensaje_error = "Error al insertar el registro.";
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
    }

    echo "<script>alert('$mensaje_error');</script>";
    echo "<script>window.location.href = '/Integrador/views/profile/V_VerProveedoresAdmin.php';</script>";
?>