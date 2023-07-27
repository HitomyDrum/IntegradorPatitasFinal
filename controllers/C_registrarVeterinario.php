<?php

    require_once('../models/Conexion.php');

    $target_dir     = "../views/img/veterinarios/";
    $name_img       = uniqid() . basename($_FILES["fileToUpload"]["name"]);
    $target_file    = $target_dir . $name_img;
    $imageFileType  = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $nombres_vet        = $_POST["nombre_vet"];
    $apellidos_vet      = $_POST["apellidos_vet"];
    $dni_vet            = $_POST["dni_vet"];
    $especialidad_vet   = $_POST["especialidad_vet"];
    $celular_vet        = $_POST["celular_vet"];
    $dir_vet            = $_POST["dir_vet"];
    $ini_dia            = $_POST["ini_dia"];
    $fin_dia            = $_POST["fin_dia"];
    $ini_hora           = $_POST["ini_hora"];
    $fin_hora           = $_POST["fin_hora"];

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
        # $queryTxt = "INSERT INTO `veterinarios` (`DNI_VET`, `NAME_VET`, `APE_VET`, `CEL_VET`, `ESPEC_VET`, `DIR_VET`) VALUES ('$dni_vet', '$nombres_vet', '$apellidos_vet', '$celular_vet', '$especialidad_vet', '$dir_vet');";
        $queryTxt = "INSERT INTO `veterinarios` (`DNI_VET`, `NAME_VET`, `APE_VET`, `CEL_VET`, `ESPEC_VET`, `DIR_VET`, `DIA_INI`, `DIA_FIN`, `HORA_INI`, `HORA_FIN`, `IMG_PATH`) VALUES ('$dni_vet', '$nombres_vet', '$apellidos_vet', '$celular_vet', '$especialidad_vet', '$dir_vet', '$ini_dia', '$fin_dia', '$ini_hora', '$fin_hora', '$name_img');";
        $query = $con->con->query($queryTxt);

        if ($query) {
            $mensaje_error = "El registro se ha insertado correctamente.";
        } else {
            $mensaje_error = "Error al insertar el registro.";
        }
    } catch (Exception $e) {
        $mensaje_error = "Hubo un error con la base de datos! - $e";
    }

    echo "<script>alert('$mensaje_error');</script>";
    echo "<script>window.location.href = '/Integrador/views/profile/V_VerVeterinariosAdmin.php';</script>";
?>