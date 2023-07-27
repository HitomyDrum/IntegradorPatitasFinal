<?php

    require('../models/Conexion.php');

    $con = new Conexion();

    require_once('./C_verMascotasAdminLista.php')
?>
<script>
    function eliminarMascota(id) {
        var pregunta = confirm("¿Seguro que quieres eliminar esta mascota?");
        if (pregunta) {
            $.ajax({
                url: '../../controllers/C_EliminarMascota.php',
                type: 'POST',
                dataType: 'html',
                data: {id: id},
            }) // Obtengo la respuesta si es válida y actualizamos las etiquetas de los id correspondientes.
            .done(function(respuesta) {
                $("#datos_mascotas").html(respuesta);
                $("#alert_mascota_eliminado").show();

                setTimeout(function () {
                    $("#alert_mascota_eliminado").slideUp(500);
                }, 3000);
            })
            .fail(function() {
                console.log("Error en buscar datos de la mascota.")
            });
        }
    }

    // EDITAR MASCOTA - (POR HACER/OPCIONAL)
    // Llenar formulario - Click en la etiqueta button con class editarProductoJS
    /*$(document).ready(function () {
        $('.editarProductoJS').on('click', function() {
            $('#editarProductos').modal('show')
            console.log("RARO")

            $tr = $(this).closest('tr');

            // Obtenemos los datos de todos los td dentro de tr
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            //console.log(data);

            // Actualizamos los input con los valores de los td de la fila.
            $('input[name=edit_id_prod').val(data[0]);
            $('input[name=edit_nombre_prod').val(data[1]);
            $('input[name=edit_precio_uni').val(data[2]);
            $('input[name=edit_stock_pro').val(data[4]);

            var selectElement = document.getElementById("edit_ruc_proveedor");
            selectElement.value = data[3];

            $('textarea[name=edit_descripcion_prod').val(data[5]);
        })

    });*/
</script>