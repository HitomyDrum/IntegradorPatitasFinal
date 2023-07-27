<?php

    require('../../models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query('SELECT * FROM proveedores');

    $proveedores = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $proveedores[$i] = $fila;
        $i++;
    }
?>