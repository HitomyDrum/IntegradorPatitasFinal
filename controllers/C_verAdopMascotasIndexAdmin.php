<?php
    require_once('./models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query('SELECT * FROM mascotas_adopcion');

    $mascotasAdopcionIndex = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $mascotasAdopcionIndex[$i] = $fila;
        $i++;
    }
?>