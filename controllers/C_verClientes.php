<?php

    require('../../models/Conexion.php');

    $con = new Conexion();

    $clientes = $con->getUsers();

?>