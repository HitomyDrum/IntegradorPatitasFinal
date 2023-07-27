<?php

    $con = new Conexion();

    # $query = $con->con->query("SELECT * FROM esteticas WHERE ID_PET = $idPet;");
    $query = $con->con->query("SELECT e.*, et.NAME_ETIPOS
        FROM esteticas e
        JOIN esteticas_tipos et ON e.ID_ETIPOS = et.ID_ETIPOS
        WHERE e.ID_PET = $idPet;
    ;");

    $esteticas = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $esteticas[$i] = $fila;
        $i++;
    }
?>