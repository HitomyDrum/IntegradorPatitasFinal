<?php

    require('../../models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query('SELECT * FROM desparasitaciones;');

    $desparasitaciones = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $desparasitaciones[$i] = $fila;
        $i++;
    }
?>