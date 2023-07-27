<?php

    require('../../models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query('SELECT * FROM esteticas;');

    $esteticas = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $esteticas[$i] = $fila;
        $i++;
    }
?>