<?php
    
    require('../models/Conexion.php');

    $con = new Conexion();

    require_once('./C_verAdopMascotasAdminLista.php')
?>
<script>
    function eliminarMascotaAdopcion(id) {
        var pregunta = confirm("¿Deseas eliminar esta mascota?");
        if (pregunta) {
            $.ajax({
                url: '../../controllers/C_EliminarMascotaAdopcion.php',
                type: 'POST',
                dataType: 'html',
                data: {id: id},
            }) // Obtengo la respuesta si es válida y actualizamos las etiquetas de los id correspondientes.
            .done(function(respuesta) {
                $("#datos_mascotas_adopciones").html(respuesta);

                $("#alert_producto_eliminado").show();
                setTimeout(function () {
                    $("#alert_producto_eliminado").slideUp(500);
                }, 3000);
            })
            .fail(function() {
                console.log("Error en buscar datos del producto.")
            });
        }
    }

    // EDITAR PRODUCTO
    // Llenar formulario - Click en la etiqueta button con class editarProductoJS
    $(document).ready(function () {
        $('.editarProductoJS').on('click', function() {
            $('#editar_mascotas_adopcion').modal('show')

            $tr = $(this).closest('tr');

            // Obtenemos los datos de todos los td dentro de tr
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            //console.log(data);

            // Actualizamos los input con los valores de los td de la fila.
            $('input[name=edit_id_mascota').val(data[0]);
            $('input[name=edit_nombre_mascota').val(data[1]);
            $('input[name=edit_edad_mascota').val(data[2]);
            $('input[name=edit_raza_mascota').val(data[4]);
            $('input[name=edit_sexo_mascota').val(data[5]);
            $('input[name=edit_color_mascota').val(data[6]);
            

            var selectElement = document.getElementById("edit_estado_mascota");
            selectElement.value = data[3];
        })
    });
</script>