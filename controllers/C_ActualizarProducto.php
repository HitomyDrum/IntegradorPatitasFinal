<?php
    require_once('../models/Conexion.php');

    $IdProductoEditado = $_POST["edit_id_prod"];
    $NombreProductoEditado = $_POST["edit_nombre_prod"];
    $PrecUnitProductoEditado = $_POST["edit_precio_uni"];
    $StockProductoEditado = $_POST["edit_stock_pro"];
    $RucProvProductoEditado = $_POST["edit_ruc_proveedor"];
    $DescProductoEditado = $_POST["edit_descripcion_prod"];

    $con = new Conexion();

    try {
        $queryTxt = "UPDATE `productos` SET `NOM_PROD` = '$NombreProductoEditado', `PREC_UNIT` = $PrecUnitProductoEditado, `DESCRIPCION` = '$DescProductoEditado', `RUC_PROV` = '$RucProvProductoEditado', `STOCK` = $StockProductoEditado WHERE `productos`.`ID_PROD` = $IdProductoEditado;";
        $query = $con->con->query($queryTxt);

        if ($query) {
            $mensaje_error = "El registro se ha insertado correctamente.";
        } else {
            $mensaje_error = "Error al insertar el registro.";
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
    }

    header("Location: /Integrador/views/profile/V_VerProductosAdmin.php?ac=1");

    # echo $mensaje_error;

?>