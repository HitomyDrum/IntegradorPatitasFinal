<?php
    $query = $con->con->query('SELECT ID_PET, TIPO_PET, NAME_PET, DNI_CLI FROM mascotas ORDER BY DNI_CLI ASC;');

    $mascotas_form = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $mascotas_form[$i] = $fila;
        $i++;
    }
?>