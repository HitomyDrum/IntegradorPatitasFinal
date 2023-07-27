<?php

    require_once('../../models/Conexion.php');

    $con = new Conexion();

    $clientes = $con->getPets($dni);

?>