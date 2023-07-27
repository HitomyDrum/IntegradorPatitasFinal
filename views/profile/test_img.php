<?php
// Inicializar cURL
$ch = curl_init();

// Configurar la opción de URL
curl_setopt($ch, CURLOPT_URL, "http://129.153.109.116:8080/dni=44443333");

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

// Imprimir la información de la imagen
echo $imageData;
?>