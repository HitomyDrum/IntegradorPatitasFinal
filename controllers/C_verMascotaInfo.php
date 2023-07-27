<?php

    require('../../models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query('SELECT * FROM mascotas WHERE ID_PET = ;');

    $vacunas = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $vacunas[$i] = $fila;
        $i++;
    }
?>