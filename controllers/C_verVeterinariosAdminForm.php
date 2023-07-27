<?php

    // Configurar la conexión a la base de datos
    $mysqli = new mysqli("localhost", "root", "", "reniec");

    // Verificar conexión
    if ($mysqli->connect_errno) {
        echo "Error al conectar con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        exit();
    }

    // Obtener el DNI del formulario
    $dni = $_POST['dni'];

    // Preparar y ejecutar la consulta
    $stmt = $mysqli->prepare("SELECT * FROM personas WHERE dni = ?");
    $stmt->bind_param("s", $dni);
    $stmt->execute();

    // Obtener el resultado
    $resultado = $stmt->get_result()->fetch_assoc();

    // Solicitud GET con cURL
    // Inicializar cURL
    $ch = curl_init();

    // Configurar la opción de URL
    curl_setopt($ch, CURLOPT_URL, "http://129.153.109.116:8080/dni=$dni");

    // Configurar la opción de devolución de transferencia para obtener el resultado como una cadena
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Realizar la solicitud
    $response = curl_exec($ch);

    // Comprobar si se produjo un error en cURL
    if ($error = curl_error($ch)) {
        die('Error en cURL: ' . $error);
    }

    // Cerrar la sesión cURL
    curl_close($ch);

    // Decodificar la respuesta JSON
    $data = json_decode($response);

    // Acceder a la propiedad 'data' del objeto
    $imageData = $data->data;

    $base64_image_string = $imageData;
    $resultado['FOTO'] = $base64_image_string;

    echo json_encode($resultado);

    // Devolver los datos en formato JSON
    # echo json_encode($resultado);

    $stmt->close();
    $mysqli->close();


    // Guardamos la foto en formato imagen

    // Remover el prefijo (si existe) que indica que los datos son una imagen base64
    /* $base64_image_string = str_replace('data:image/jpeg;base64,', '', $base64_image_string);
    $base64_image_string = str_replace(' ', '+', $base64_image_string);

    // Decodificar la imagen base64
    $data = base64_decode($base64_image_string);

    // Definir la ruta del archivo donde se guardará la images
    $nombre_en_ruta = $resultado['NOMBRES'];
    $file = "../views/img/veterinarios/$nombre_en_ruta-$dni.jpg";
    // Guardar la imagen en el archivo
    file_put_contents($file, $data); */
?>