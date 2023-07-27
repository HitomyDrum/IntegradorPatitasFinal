<!DOCTYPE html>
<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link  href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.css" rel="stylesheet">
    <style>
        #imagePreview {
            width: 300px;
            height: 300px;
            display: none; /* Esconde la imagen inicialmente */
        }
        .alert {
            color: red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.0.0/cropper.min.js"></script>
</head>
<body>
<div class="container">
    <form id="fileUploadForm" action="upload.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="fileToUpload">Selecciona imagen a cargar:</label>
            <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload">
            <div id="error-message" class="alert"></div>
        </div>
        <input type="submit" class="btn btn-primary" value="Subir imagen" name="submit">
    </form>
    <img id="imagePreview" src="">
</div>
<script>
$(document).ready(function(){
    var cropper;
    $('#fileToUpload').on('change', function(){
        var file = this.files[0];
        var maxSizeMB = 3;
        var maxSizeBytes = maxSizeMB * 1024 * 1024;
        
        if(file.size > maxSizeBytes) {
            $('#error-message').text('El archivo es demasiado grande. El tamaño máximo permitido es ' + maxSizeMB + 'MB.');
            this.value = ""; // Limpia el valor del campo de archivo
            return; // Salimos de la función
        }

        if (file.type == "image/jpeg" || file.type == "image/png") {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (cropper) {
                    cropper.destroy();  // Destruye la instancia anterior de cropper
                }
                $('#imagePreview').attr('src', e.target.result).show();
                cropper = new Cropper(document.getElementById('imagePreview'), {
                    aspectRatio: 1,
                    viewMode: 1,
                    dragMode: 'crop',
                    autoCropArea: 1,
                    restore: false,
                    guides: false,
                    center: false,
                    highlight: false,
                    cropBoxMovable: true,
                    cropBoxResizable: true,
                    toggleDragModeOnDblclick: false
                });
                $('#error-message').text('');  // Limpia el mensaje de error
            }
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
