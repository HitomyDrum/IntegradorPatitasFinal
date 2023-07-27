<!DOCTYPE html>
<html>
<head>
    <title>Subir imagen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <style>
        #preview-image {
            width: 300px;
            height: 300px;
            margin-bottom: 10px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Subir imagen</h1>
        <form id="formulario" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagen" class="form-label">Seleccionar imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                <div id="error-msg" class="invalid-feedback"></div>
            </div>
            <button type="submit" class="btn btn-primary">Subir imagen</button>
        </form>

        <div id="preview-image"></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script>
        document.getElementById("imagen").addEventListener("change", function(event) {
            var input = event.target;
            var errorMsg = document.getElementById("error-msg");
            var file = input.files[0];
            var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
            var maxFileSize = 3 * 1024 * 1024; // 3 megabytes
            var previewImage = document.getElementById("preview-image");

            if (!file) {
                previewImage.style.backgroundImage = "none";
                return;
            }

            if (!allowedExtensions.exec(file.name)) {
                previewImage.style.backgroundImage = "none";
                errorMsg.textContent = "Solo se permiten archivos con extensiones JPG, JPEG o PNG.";
                errorMsg.style.display = "block";
                return;
            }

            if (file.size > maxFileSize) {
                previewImage.style.backgroundImage = "none";
                errorMsg.textContent = "El tamaño del archivo no puede superar los 3 megabytes.";
                errorMsg.style.display = "block";
                return;
            }

            /*var reader = new FileReader();
            reader.onload = function(e) {
                var croppie = new Croppie(previewImage, {
                    viewport: { width: 300, height: 300 },
                    boundary: { width: 300, height: 300 },
                    enableOrientation: true
                });
                croppie.bind({
                    url: e.target.result
                });
            };
            reader.readAsDataURL(file);*/
            var reader = new FileReader();
            reader.onload = function(e) {
                previewImage.style.backgroundImage = "url('" + e.target.result + "')";
            };
            reader.readAsDataURL(file);
        });
    </script>
</body>
</html>
