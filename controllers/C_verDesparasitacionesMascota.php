<?php

    $con = new Conexion();

    $query = $con->con->query("SELECT * FROM desparasitaciones WHERE ID_PET = $idPet;");

    $desparasitaciones = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $desparasitaciones[$i] = $fila;
        $i++;
    }
?>