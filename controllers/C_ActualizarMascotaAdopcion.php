<?php
    require_once('../models/Conexion.php');

    $edit_id_mascota = $_POST["edit_id_mascota"];
    $edit_nombre_mascota = $_POST["edit_nombre_mascota"];
    $edit_edad_mascota = $_POST["edit_edad_mascota"];
    $edit_raza_mascota = $_POST["edit_raza_mascota"];
    $edit_sexo_mascota = $_POST["edit_sexo_mascota"];
    $edit_color_mascota = $_POST["edit_color_mascota"];
    $edit_estado_mascota = $_POST["edit_estado_mascota"];

    echo "$edit_id_mascota - $edit_nombre_mascota | $edit_edad_mascota | $edit_raza_mascota | $edit_sexo_mascota | $edit_color_mascota | $edit_estado_mascota";

    $con = new Conexion();

    try {
        $queryTxt = "UPDATE `mascotas_adopcion` SET `NAME_PET` = '$edit_nombre_mascota', `EDAD_PET` = '$edit_edad_mascota', `RAZA_PET` = '$edit_raza_mascota', `SEXO_PET` = '$edit_sexo_mascota', `COLOR_PET` = '$edit_color_mascota', `ESTADO` = '$edit_estado_mascota' WHERE `mascotas_adopcion`.`ID_PET` = $edit_id_mascota;";
        $query = $con->con->query($queryTxt);

        if ($query) {
            $mensaje_error = "El registro se ha insertado correctamente.";
        } else {
            $mensaje_error = "Error al insertar el registro.";
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
    }

   header("Location: /Integrador/views/profile/V_VerAdopcionesAdmin.php?ac=1");

   # echo $mensaje_error;

?>