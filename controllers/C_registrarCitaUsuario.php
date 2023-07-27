<?php

    require_once('../models/Conexion.php');

    $id_pet                 = $_POST["id_pet"];
    $dni_vet                = $_POST["dni_vet"];
    $textarea_observacion   = $_POST["textarea_observacion"];
    $textarea_comentario    = $_POST["textarea_comentario"];

    $fecha_cita             = $_POST["fecha_cita"];
    $fecha_creacion         = date('Y-m-d H:i:s');
    /* Estados:  0 = Pendiente (default) | 1 = Confirmada | 2 = Finalizada */
    $estado         = 0;
    $precio_final   = $precio_servicio;
    $con            = new Conexion();

    echo "$id_pet | $dni_vet | $textarea_observacion | $textarea_comentario | $fecha_cita | $fecha_creacion";

    try {
        $queryTxt = "INSERT INTO `cita` (`ID_PET`, `DNI_VET`, `FECH_CREA`, `FECH_CITA`, `COMENT_CITA`, `OBSERV_CITA`, `ESTADO`) VALUES ('$id_pet', '$dni_vet', '$fecha_creacion', '$fecha_cita', '$textarea_observacion', '$textarea_comentario', '$estado');";
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
    echo "<script>window.location.href = '/Integrador/views/profile/V_AgendarCitaUsuario.php';</script>";
?>