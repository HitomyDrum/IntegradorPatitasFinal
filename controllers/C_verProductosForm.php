<?php
    $query = $con->con->query('SELECT ID_PROD, NOM_PROD, PREC_UNIT FROM productos;');

    $productos_form = [];

    $i = 0;
    while($fila = $query->fetch_assoc()) {
        $productos_form[$i] = $fila;
        $i++;
    }
?>