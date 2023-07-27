<?php
    $query = $con->con->query('SELECT * FROM veterinarios;');

    $veterinarios_form = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $veterinarios_form[$i] = $fila;
        $i++;
    }
?>