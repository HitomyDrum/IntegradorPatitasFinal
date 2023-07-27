<?php

require('../../models/Conexion.php');

$con = new Conexion();

$mascotas = $con->getAllPets();

?>