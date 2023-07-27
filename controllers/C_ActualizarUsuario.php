<?php

require('../models/Conexion.php');

$con = new Conexion();

$correo = $_POST["correo"];
$pass = $_POST["pass"];
$nombres = $_POST["nombres_usuario"];
$apellidos = $_POST["apellidos_usuario"];
$celular = $_POST["cell"];
$dir = $_POST["dir"];
$dni = $_POST["dni_cli"];


$registro = $con->actualizarUsers($correo, $pass, $nombres, $apellidos, $celular, $dir, $dni);

# echo "<h1>$registro</h1>";

header("Location: ../../../Integrador/views/profile/V_PerfilUsuario.php")


?>