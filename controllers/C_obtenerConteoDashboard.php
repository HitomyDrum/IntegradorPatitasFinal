<?php
    require('../../models/Conexion.php');

    $con = new Conexion();

    $query = $con->con->query("SELECT 
        COUNT(*) AS registros_clientes,
        (SELECT COUNT(*) FROM mascotas) AS registros_mascotas
    FROM
        clientes");

    if ($query) {
        // Obtener los resultados y almacenarlos en variables
        $row = $query->fetch_assoc();
        $registros_clientes = $row['registros_clientes'];
        $registros_mascotas = $row['registros_mascotas'];
    } else {
        echo "Error en la consulta: " . $conn->error;
    }
?>