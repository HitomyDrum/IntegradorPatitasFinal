<?php

    require('../models/Conexion.php');

    $con = new Conexion();

    $tipo = $_POST["tipo_mascota"];
    $nombre = $_POST["nombre_mascota"];
    $edad = $_POST["edad_mascota"];
    $raza = $_POST["raza_mascota"];
    $color = $_POST["color_mascota"];
    $dni = $_POST["dni_cli"];

    # echo "$tipo - $nombre - $edad - $raza - $color - $dni";

    $registro = $con->registerPets($tipo, $nombre, $edad, $raza, $color, $dni);

    # echo "<h1>$registro</h1>";

    header("Location: /Integrador/views/profile/V_PerfilUsuario.php")


?>