<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <style>
        #imagePreview {
            width: 00px;
            height: 300px;
            margin-bottom: 10px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: none; /* Esconde la imagen inicialmente */
        }
        .alert {
            color: red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <form id="fileUploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fileToUpload">Selecciona imagen a cargar:</label>
            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
            <div id="error-message" class="alert"></div>
        </div>
        <input hidden type="submit" class="btn btn-primary" value="Subir imagen" name="submit">
        <button name="submit">Recortar y Subir Imagen</button>
    </form>
    <img id="imagePreview" src="">
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>
    $(document).ready(function(){
        var cropper;
        $('#fileToUpload').on('change', function(){
            var file = this.files[0];
            var maxSizeMB = 3;
            var maxSizeBytes = maxSizeMB * 1024 * 1024;
            var previewImage = document.getElementById("imagePreview");
            
            if(file.size > maxSizeBytes) {
                $('#error-message').text('El archivo es demasiado grande. El tamaño máximo permitido es ' + maxSizeMB + 'MB.');
                this.value = ""; // Limpia el valor del campo de archivo
                return; // Salimos de la función
            }

            if (file.type == "image/jpeg" || file.type == "image/png") {
                $('#error-message').text('');  // Limpia el mensaje de error
                var reader = new FileReader();
                reader.onload = function(e) {
                    var croppie = new Croppie(previewImage, {
                        viewport: { width: 300, height: 300 },
                        boundary: { width: 300, height: 300 },
                        showZoomer: true,
                        enableOrientation: true
                    });
                    croppie.bind({
                        url: e.target.result
                    });
                };
                reader.readAsDataURL(file);
            } else {
                $('#error-message').text('Formato de archivo no válido. Solo se permite PNG o JPG.');
                this.value = "";  // Limpia el valor del campo de archivo
            }
        });

        $('#fileUploadForm').on('submit', function(e) {
            if ($('#fileToUpload').get(0).files.length === 0) {
                e.preventDefault(); // previene el envío del formulario
                $('#error-message').text('Por favor, selecciona una imagen.');
            }
        });
    });
</script>
</body>
</html>
