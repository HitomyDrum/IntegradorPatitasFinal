<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

</head>
<body>
    <div id="demo"></div>
    <button id="crop_image">Recortar y Subir Imagen</button>

    <script>
        let el = document.getElementById('demo');
        let vanilla = new Croppie(el, {
            viewport: { width: 100, height: 100 },
            boundary: { width: 300, height: 300 },
            showZoomer: false,
            enableOrientation: true
        });

        document.getElementById('crop_image').addEventListener('click', function(ev) {
            vanilla.result('blob').then(function(blob) {
                let formData = new FormData();
                formData.append('fileToUpload', blob);
                fetch('upload.php', { method: 'POST', body: formData })
                .then(response => response.text())
                .then(data => console.log(data))
                .catch(error => console.error('Error:', error));
            });
        });


    </script>

</body>
</html>