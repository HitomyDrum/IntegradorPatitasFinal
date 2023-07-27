<?php

require('../models/Conexion.php');

$con = new Conexion();

$correo = $_POST["email"];
$pass = $_POST["password"];
$nombres = $_POST["Nombres"];
$apellidos = $_POST["Apellidos"];
$celular = $_POST["Celular"];
$dir = $_POST["Direccion"];
$dni = $_POST["DNI"];

$registro = $con->registerUsers($correo, $pass, $nombres, $apellidos, $celular, $dir, $dni);

# echo "<h1>$registro</h1>";


?>