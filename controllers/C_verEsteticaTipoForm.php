<?php
    $query = $con->con->query('SELECT ID_ETIPOS, NAME_ETIPOS, PRECIO_ETIPOS FROM esteticas_tipos;');

    $esteticas_tipos = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $esteticas_tipos[$i] = $fila;
        $i++;
    }
?>