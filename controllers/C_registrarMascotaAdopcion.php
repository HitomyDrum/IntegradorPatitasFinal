<?php

    require_once('../models/Conexion.php');

    $target_dir = "../views/img/pets_adoption/";
    $name_img = uniqid() . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $name_img;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $nombre_mascota = $_POST["nombre_mascota"];
    $edad_mascota = $_POST["edad_mascota"];
    $raza_mascota = $_POST["raza_mascota"];
    $sexo_mascota = $_POST["sexo_mascota"];
    $color_mascota = $_POST["color_mascota"];
    $tipo_mascota = $_POST["tipo_mascota"];
    $tutor_mascota = $_POST["tutor_mascota"];
    $desc_mascota = $_POST["desc_mascota"];



    $fechaHoraActual = date('Y-m-d H:i:s');

    $con = new Conexion();

    // Verifica si el archivo es una imagen o no
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            if($imageFileType == "jpg" || $imageFileType == "png") {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ha sido subido.";
                    echo "La ruta es " . $name_img;
                } else {
                    echo "Error al subir el archivo.";
                }
            } else {
                echo "El archivo no es una imagen jpg o png.";
            }
        } else {
            echo "El archivo no es una imagen.";
        }
    }

    try {
        $queryTxt = "INSERT INTO `mascotas_adopcion` (`ID_PET`, `TIPO_PET`, `NAME_PET`, `EDAD_PET`, `RAZA_PET`, `SEXO_PET`, `COLOR_PET`, `ESTADO`, `FECH_CREA`, `IMG_PATH`, `TUTOR`, `DESCRIPCION`) VALUES (NULL, '$tipo_mascota', '$nombre_mascota', '$edad_mascota', '$raza_mascota', '$sexo_mascota', '$color_mascota', 'En adopción', '$fechaHoraActual', '$name_img', '$tutor_mascota', '$desc_mascota');";
        $query = $con->con->query($queryTxt);

        if ($query) {
            header("Location: /Integrador/views/profile/V_VerAdopcionesAdmin.php?ag=1");
        } else {
            $mensaje_error = "Error al insertar el registro.";
            header("Location: /Integrador/views/profile/V_VerAdopcionesAdmin.php");
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
        
    }

    echo "<script>alert('$mensaje_error');</script>";
    echo "<script>window.location.href = '/Integrador/views/profile/V_VerAdopcionesAdmin.php';</script>";

?>