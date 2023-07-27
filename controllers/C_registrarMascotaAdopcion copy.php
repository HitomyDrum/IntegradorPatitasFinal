<?php

    require_once('../models/Conexion.php');

    $nombre_mascota = $_POST["nombre_mascota"];
    $edad_mascota = $_POST["edad_mascota"];
    $raza_mascota = $_POST["raza_mascota"];
    $sexo_mascota = $_POST["sexo_mascota"];
    $color_mascota = $_POST["color_mascota"];
    $tipo_mascota = $_POST["tipo_mascota"];


    $fechaHoraActual = date('Y-m-d H:i:s');

    $con = new Conexion();

    try {
        $queryTxt = "INSERT INTO `mascotas_adopcion` (`ID_PET`, `TIPO_PET`, `NAME_PET`, `EDAD_PET`, `RAZA_PET`, `SEXO_PET`, `COLOR_PET`, `ESTADO`, `FECH_CREA`) VALUES (NULL, '$tipo_mascota', '$nombre_mascota', '$edad_mascota', '$raza_mascota', '$sexo_mascota', '$color_mascota', 'En adopción', '$fechaHoraActual');";
        $query = $con->con->query($queryTxt);

        if ($query) {
            header("Location: /Integrador/views/profile/V_VerAdopcionesAdmin.php?ag=1");
        } else {
            $mensaje_error = "Error al insertar el registro.";
            header("Location: /Integrador/views/profile/V_VerAdopcionesAdmin.php");
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
        echo "<script>alert('$mensaje_error');</script>";
        echo "<script>window.location.href = '/Integrador/views/profile/V_VerAdopcionesAdmin.php';</script>";
    }

?>