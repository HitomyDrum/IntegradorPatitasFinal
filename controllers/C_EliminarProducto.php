<?php
    require('../models/Conexion.php');

    $con = new Conexion();

    $id = $_REQUEST['id']; 

    $query = "DELETE FROM `productos` WHERE `productos`.`ID_PROD` = $id";
    $resultado = $con->con->query($query);

    require_once('./C_verProductosAdminLista.php')
?>
  