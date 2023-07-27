<?php
    $con = new Conexion();

    $query = $con->con->query('SELECT RUC, RAZON_SOCIAL FROM proveedores');

    $proveedores = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $proveedores[$i] = $fila;
        $i++;
    }
?>