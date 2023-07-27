<?php

require('../models/Conexion.php');

$con = new Conexion();

$id_pet = $_POST["id_pet"];
$coment_cita = $_POST["textarea_comentario"];


$registro = $con->registerCita($coment_cita, $id_pet);

echo "<h1>$registro</h1>";

#header("Location: ../../../Integrador/views/V_PerfilUsuario.php")


?>