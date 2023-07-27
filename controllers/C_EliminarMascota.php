<?php
    require('../models/Conexion.php');

    $con = new Conexion();

    $id = $_REQUEST['id']; 

    $query = "DELETE FROM `mascotas` WHERE `mascotas`.`ID_PET` = $id";
    $resultado = $con->con->query($query);

    require_once('./C_verMascotasAdminLista.php')
?>
  