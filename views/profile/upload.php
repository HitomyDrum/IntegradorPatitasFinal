<?php
    $target_dir = "uploads/";
    $name_img = uniqid() . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $name_img;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
?>
