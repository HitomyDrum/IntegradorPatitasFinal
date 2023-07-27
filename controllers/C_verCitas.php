<?php

require('../../models/Conexion.php');

$con = new Conexion();

$citas = $con->getCitas();

?>