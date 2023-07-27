<?php
    require_once('../../models/Conexion.php');

    function verCliente($dni) {
        $con = new Conexion();

        $query = $con->con->query("SELECT * FROM clientes WHERE DNI_CLI='$dni';");
        $data = $query->fetch_assoc();

        return $data;
    }
?>