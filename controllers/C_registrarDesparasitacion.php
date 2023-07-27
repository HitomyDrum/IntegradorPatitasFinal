<?php

    require_once('../models/Conexion.php');

    $id_pet = $_POST["id_pet"];
    $dni_vet = $_POST["dni_vet"];
    $nombre_desparasitacion = $_POST["nombre_desparasitacion"];
    $id_producto = $_POST["id_producto"];
    $precio_aplicacion = $_POST["precio_aplicacion"];
    $fecha_cita = $_POST["fecha_cita"];
    $hora_cita = $_POST["hora_cita"];
    $fecha_creacion = date('Y-m-d H:i:s');
    /* Estados:  0 = Pendiente (default) | 1 = Completada (pagada) | 2 = No pagada */
    $estado = 0;

    $con = new Conexion();

    $query = $con->con->query("SELECT PREC_UNIT FROM `productos` WHERE ID_PROD='$id_producto';");
    $fila = $query->fetch_assoc();
    $precio_unit = $fila['PREC_UNIT'];

    #echo $precio_unit;

    $precio_final = $precio_unit + $precio_aplicacion;

    try {
        $queryTxt = "INSERT INTO `desparasitaciones` (`ID_DESP`, `ID_PET`, `ID_PROD`, `DNI_VET`, `NOM_DESP`, `FECH_CREA`, `FECH_CITA`, `HORA_CITA`, `ESTADO`, `PRECIO_FINAL`) VALUES (NULL, '$id_pet', '$id_producto', '$dni_vet', '$nombre_desparasitacion', '$fecha_creacion', '$fecha_cita', '$hora_cita', '$estado', '$precio_final')";
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
    echo "<script>window.location.href = '/Integrador/views/profile/V_VerDesparasitacionesAdmin.php';</script>";
?>