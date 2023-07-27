<?php

    require_once('../models/Conexion.php');

    $id_pet = $_POST["id_pet"];
    $dni_vet = $_POST["dni_vet"];
    $tipo_estetica = $_POST["tipo_estetica"];
    $precio_servicio = $_POST["precio_servicio"];
    $fecha_cita = $_POST["fecha_cita"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fin = $_POST["hora_fin"];
    $fecha_creacion = date('Y-m-d H:i:s');
    /* Estados:  0 = Pendiente (default) | 1 = Completada (pagada) | 2 = No pagada */
    $estado = 0;

    $precio_final = $precio_servicio;
    $con = new Conexion();

    # echo "$id_pet | $dni_vet | $tipo_estetica | $precio_servicio | $fecha_cita | $hora_inicio | $hora_fin | $precio_final";

    try {
        $queryTxt = "INSERT INTO `esteticas` (`ID_EST`, `ID_PET`, `DNI_VET`, `ID_ETIPOS`, `FECH_CREA`, `FECH_CITA`, `HORA_INICIO`, `HORA_FIN`, `ESTADO`, `PRECIO_FINAL`) VALUES (NULL, '$id_pet', '$dni_vet', '$tipo_estetica', '$fecha_creacion', '$fecha_cita', '$hora_inicio', '$hora_fin', '$estado', '$precio_final');";
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
    echo "<script>window.location.href = '/Integrador/views/profile/V_VerEsteticasAdmin.php';</script>";
?>