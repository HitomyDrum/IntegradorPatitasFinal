$(buscar_datos_productos());
$(buscar_datos_mascotas());
$(buscar_datos_mascotas_adopcion());
$(buscar_datos_veterinarios());

//================= Buscamos Productos ================//
function buscar_datos_productos(consulta) {
    $.ajax({
        url: '../../controllers/C_verProductosAdmin.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos").html(respuesta);
    })
    .fail(function() {
        console.log("Error en buscar datos del producto.")
    })
}

// Cuando se escriba algo en la caja de busqueda, ejecutamos la función buscar_datos_productos
$(document).on('keyup', '#caja_busqueda', function(){
    var valor = $(this).val();
    if(valor != "") {
        buscar_datos_productos(valor)
    } else {
        buscar_datos_productos()
    }
});


//================= Buscamos Mascotas ================//
function buscar_datos_mascotas(consulta) {
    $.ajax({
        url: '../../controllers/C_verMascotasAdmin.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos_mascotas").html(respuesta);
    })
    .fail(function() {
        console.log("Error en buscar datos de la mascota.")
    })
}

// Cuando se escriba algo en la caja de busqueda, ejecutamos la función buscar_datos_productos
$(document).on('keyup', '#caja_busqueda_mascotas', function(){
    var valor = $(this).val();
    if(valor != "") {
        buscar_datos_mascotas(valor)
    } else {
        buscar_datos_mascotas()
    }
});


//================= Buscamos Mascotas Adopciones ================//
function buscar_datos_mascotas_adopcion(consulta) {
    $.ajax({
        url: '../../controllers/C_verAdopMascotasAdmin.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        $("#datos_mascotas_adopciones").html(respuesta);
    })
    .fail(function() {
        console.log("Error en buscar datos de la mascota.")
    })
}

// Cuando se escriba algo en la caja de busqueda, ejecutamos la función buscar_datos_productos
$(document).on('keyup', '#caja_busqueda_mascotas_adopcion', function(){
    var valor = $(this).val();
    if(valor != "") {
        buscar_datos_mascotas_adopcion(valor)
    } else {
        buscar_datos_mascotas_adopcion()
    }
});


//================= Buscamos Veterinarios ================//
function buscar_datos_veterinarios(consulta) {
    $.ajax({
        url: '../../controllers/C_verVeterinariosAdmin.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta) {
        console.log(respuesta)
        $("#datos_veterinarios").html(respuesta);
    })
    .fail(function() {
        console.log("Error en buscar datos de la mascota.")
    })
}

// Cuando se escriba algo en la caja de busqueda, ejecutamos la función buscar_datos_productos
$(document).on('keyup', '#caja_busqueda_veterinarios', function(){
    var valor = $(this).val();
    if(valor != "") {
        buscar_datos_veterinarios(valor)
    } else {
        buscar_datos_veterinarios()
    }
});