<?php
    $con = new Conexion();

    $query = $con->con->query("SELECT * FROM vacunas WHERE ID_PET = $idPet");

    $vacunas = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $vacunas[$i] = $fila;
        $i++;
    }
?>