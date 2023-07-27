<?php

    require_once('../models/Conexion.php');

    $nombre_prod = $_POST["nombre_prod"];
    $precio_uni = $_POST["precio_uni"];
    $stock_pro = $_POST["stock_pro"];
    $ruc_proveedor = $_POST["ruc_proveedor"];
    $descripcion_prod = $_POST["descripcion_prod"];
    $fechaHoraActual = date('Y-m-d H:i:s');

    $con = new Conexion();

    try {
        $queryTxt = "INSERT INTO `productos` (`NOM_PROD`, `PREC_UNIT`, `FECH_INGRESO`, `DESCRIPCION`, `RUC_PROV`, `STOCK`) VALUES ('$nombre_prod', '$precio_uni', '$fechaHoraActual', '$descripcion_prod', '$ruc_proveedor', '$stock_pro');";
        $query = $con->con->query($queryTxt);

        if ($query) {
            header("Location: /Integrador/views/profile/V_VerProductosAdmin.php?ag=1");
        } else {
            $mensaje_error = "Error al insertar el registro.";
            header("Location: /Integrador/views/profile/V_VerProductosAdmin.php");
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
        echo "<script>alert('$mensaje_error');</script>";
        echo "<script>window.location.href = '/Integrador/views/profile/V_VerProveedoresAdmin.php';</script>";
    }

?>