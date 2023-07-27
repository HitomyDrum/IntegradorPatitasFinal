<?php

    error_reporting(0);
    session_start();

    # falta editar el if y poner la web si en caos entran desde el link sin iniciar sesion

    if(isset($_SESSION['NOM_CLI']) == null || isset($_SESSION['NOM_CLI']) == "") {
        $session_activa = False;
    } else {
        $session_activa = True;
        $nombre = $_SESSION['NOM_CLI'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">
    <link rel="stylesheet" href="../css/estilos_table_cli.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <style>
        #imagePreview {
            width: 100%;
            height: 300px;
            margin-bottom: 10px;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            display: none; /* Esconde la imagen inicialmente */
        }
        .alert {
            margin: 0;
            padding: 0;
            color: red;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body> <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
    <?php require_once('../nav.php') ?>
    <?php require_once('../header_secondary.php') ?>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <?php require_once("./section_profileAdminDoc.php") ?>
                    <?php require_once("./section_links.php") ?>
                </div>
                <div class="col-lg-8">
                    <br>
                    <div class="row">
                        <div class="col msjs">
                            <?php
                                include('./msjs.php');

                                // Crear una conexión a la base de datos
                                $conn = new mysqli("localhost", "root", "", "db_patitas");

                                // Verificar la conexión
                                if ($conn->connect_error) {
                                    die("Error de conexión: " . $conn->connect_error);
                                }

                                // Consulta SQL para obtener el total de registros
                                $sql = "SELECT COUNT(*) as total FROM veterinarios";
                                $result = $conn->query($sql);

                                // Verificar si se obtuvo algún resultado
                                if ($result->num_rows > 0) {
                                    // Obtener el resultado como un arreglo asociativo
                                    $row = $result->fetch_assoc();
                                    // Obtener el total de registros
                                    $totalRegistros = $row["total"];
                                } else {
                                    $totalRegistros = 0;
                                }

                                // Cerrar la conexión a la base de datos
                                $conn->close();
                            ?>
                        </div>
                    </div>
                    <!-- TABLA NUEVA -->
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title">Lista de Veterinarios <span class="text-muted fw-normal ms-2">(<?php echo $totalRegistros;?>)</span></h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                <div>
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a
                                                aria-current="page"
                                                href="#"
                                                class="router-link-active router-link-exact-active nav-link active"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"
                                                title=""
                                                data-bs-original-title="List"
                                                aria-label="List"
                                            >
                                                <i class="bx bx-list-ul"></i>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Grid" aria-label="Grid"><i class="bx bx-grid-alt"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <a href="#" data-bs-target="#exampleModal" data-bs-toggle="modal" data-bs-target=".add-new" class="btn btn-primary d-flex justify-content-center align-items-center"><i class="bx bx-plus me-1"></i> Add New</a>
                                </div>
                                <div class="dropdown">
                                    <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="caja_busqueda_veterinarios">Buscar por DNI o Nombres: </label>
                        <input type="text" name="caja_busqueda_veterinarios" id="caja_busqueda_veterinarios" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <div class="table-responsive">
                                    <table class="table project-list-table table-nowrap align-middle table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="ps-4" style="width: 50px;">
                                                    <div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck" /><label class="form-check-label" for="contacusercheck"></label></div>
                                                </th>
                                                <th scope="col">DNI</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Especialidad</th>
                                                <th scope="col">Celular</th>
                                                <th scope="col">Horarios</th>
                                                <th scope="col" style="width: 200px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datos_veterinarios">

                                        </tbody>
                                        <script src="../js/jquery.min.js"></script>
                                        <script src="../js/main-buscador.js"></script>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------------->
                    <?php require('../../models/Conexion.php'); // Para los modals ?>
                    <div class="row">
                        <div class="col-md">
                            <form id="fileUploadForm" action="/Integrador/controllers/C_registrarVeterinario.php" method="POST" enctype="multipart/form-data">
                                <button hidden type="button" class="btn btn-patitas" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar nueva mascota</button>
                                <!-- Modal Agregar Vet-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar Veterinario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>DNI del Doc. Veterinario</h6>
                                                        <input type="text" class="form-control" name="dni_vet" id="dni_vet" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Completar datos por dni</h6>
                                                        <input class="form-control" type="button" value="Buscar" onclick="buscarDNI()">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Nombre</h6>
                                                        <input type="text" class="form-control" name="nombre_vet" id="nombre_vet" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Apellidos</h6>
                                                        <input type="text" class="form-control" name="apellidos_vet" id="apellidos_vet" required>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <h6>Especialidad</h6>
                                                        <select class="form-select" name="especialidad_vet" required>
                                                            <option value="Cirugía">Cirugía</option>
                                                            <option value="Oncología">Oncología</option>
                                                            <option value="Odontología">Odontología</option>
                                                            <option value="Medicina Felina">Medicina Felina</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Celular</h6>
                                                        <input type="text" class="form-control" name="celular_vet" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Dirección</h6>
                                                        <input type="text" class="form-control" name="dir_vet" id="dir_vet" required>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2"><h6>Días</h6></legend>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Inicio</h6>
                                                                    <select class="form-select" name="ini_dia" required>
                                                                        <option value="Lunes">Lunes</option>
                                                                        <option value="Martes">Martes</option>
                                                                        <option value="Miercoles">Miércoles</option>
                                                                        <option value="Jueves">Jueves</option>
                                                                        <option value="Viernes">Viernes</option>
                                                                        <option value="Sabado">Sábado</option>
                                                                        <option value="Domingo">Domingo</option>
                                                                        
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>Fin</h6>
                                                                    <select class="form-select" name="fin_dia" required>
                                                                        <option value="Lunes">Lunes</option>
                                                                        <option value="Martes">Martes</option>
                                                                        <option value="Miercoles">Miércoles</option>
                                                                        <option value="Jueves">Jueves</option>
                                                                        <option value="Viernes">Viernes</option>
                                                                        <option value="Sabado">Sábado</option>
                                                                        <option value="Domingo">Domingo</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <fieldset class="form-group border p-3">
                                                            <legend class="w-auto px-2"><h6>Horario</h6></legend>
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <h6>Inicio</h6>
                                                                    <input class="form-control" type="time" class="form-control" name="ini_hora" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h6>Fin</h6>
                                                                    <input class="form-control" type="time" class="form-control" name="fin_hora" required>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                </div>
                                                <!--Image-->
                                                <br>
                                                <div class="container" >
                                                    <div class="form-group">
                                                        <label for="fileToUpload"><h6>Foto</h6></label>
                                                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                                                        <input type="hidden" id="imagePath" name="imagePath" />
                                                        <div id="error-message" class="alert"></div>
                                                    </div>
                                                    <br>
                                                    <img id="imagePreview" src="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="submit">Agregar Veterinario</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Modal para editar Veterinarios -->
                            <form action="../../controllers/C_ActualizarMascotaAdopcion.php" method="POST">
                                <div class="modal fade" id="editar_mascotas_adopcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Mascota</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Mascota</h6>
                                                        <input hidden type="text" class="form-control" name="edit_id_mascota" id="edit_id_mascota" required>
                                                        <input type="text" class="form-control" name="edit_nombre_mascota" id="edit_nombre_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Edad</h6>
                                                        <input type="text" class="form-control" name="edit_edad_mascota" id="edit_edad_mascota" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Raza</h6>
                                                        <input type="text" class="form-control" name="edit_raza_mascota" id="edit_raza_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Sexo</h6>
                                                        <input type="text" class="form-control" name="edit_sexo_mascota" id="edit_sexo_mascota" required>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <h6>Color</h6>
                                                        <input type="text" class="form-control" name="edit_color_mascota" id="edit_color_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Estado</h6>
                                                        <select class="form-select" name="edit_estado_mascota" id="edit_estado_mascota" required>
                                                            <option value="En adopción">En adopción</option>
                                                            <option value="Adoptado">Adoptado</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    <script>
        //Oculta mensajes de Notificacion
        /*setTimeout(function () {
            $(".alert").slideUp(300);
        }, 3000)*/; 
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script>
        // Funcion de buscar DNI en la DB de reniec
        function buscarDNI() {
            var dni = $('#dni_vet').val();

            // Comprueba si el campo DNI está vacío
            if (!dni) {
                alert("Por favor, ingrese un DNI.");
                return; // Si está vacío, termina la función aquí.
            }

            // Comprueba si el DNI contiene solo números
            if (!/^\d+$/.test(dni)) {
                alert("El DNI debe contener solo números.");
                return; // Si no contiene solo números, termina la función aquí.
            }

            // Comprueba si el DNI tiene 8 dígitos
            if (dni.length !== 8) {
                alert("El DNI debe tener 8 dígitos.");
                return; // Si no tiene 8 dígitos, termina la función aquí.
            }

            console.log(dni)

            $.ajax({
                url: '../../controllers/C_verVeterinariosAdminForm.php',
                type: 'POST',
                dataType: 'json',
                data: {dni: dni},
            }) // Obtengo la respuesta si es válida y actualizamos las etiquetas de los id correspondientes.
            .done(function(respuesta) {
                console.log(respuesta)
                $('#nombre_vet').val(respuesta.NOMBRES);
                $('#apellidos_vet').val(respuesta.AP_PAT + " " + respuesta.AP_MAT);
                $('#dir_vet').val(respuesta.DIRECCION);

                // Preguntamos si descargamos la foto
                var base64ImageString = respuesta.FOTO;  // Reemplaza esto con tu cadena base64 real

                // Crear un elemento de enlace (a) en el DOM
                var a = document.createElement("a");

                // Configurar el enlace para descargar la imagen como un archivo .jpg
                a.href = "data:image/jpeg;base64," + base64ImageString;
                a.download = respuesta.NOMBRES + "_fotoPatitas.jpg";
                a.click();

                // Imagen base64
                var cropper;
                
                document.getElementById('imagePath').value = imagePath;

                if (cropper) {
                    cropper.destroy();  // Destruye la instancia anterior de cropper
                }

                $('#imagePreview').attr('src', "data:image/jpeg;base64," + base64ImageString).show();
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
            })
            .fail(function() {
                console.log("Error en buscar datos del producto.")
            });
        }
        // Funciones de Imagen
        $(document).ready(function(){
            var cropper;
            $('#fileToUpload').on('change', function(){
                var file = this.files[0];
                var maxSizeMB = 3;
                var maxSizeBytes = maxSizeMB * 1024 * 1024;
                
                if(file.size > maxSizeBytes) {
                    $('#error-message').text('El archivo es demasiado grande. El tamaño máximo permitido es ' + maxSizeMB + 'MB.');
                    document.getElementById('imagePreview').style.display = 'none';
                    this.value = ""; // Limpia el valor del campo de archivo
                    return; // Salimos de la función
                }

                if (file.type == "image/jpeg" || file.type == "image/png") {
                    $('#error-message').text('');  // Limpia el mensaje de error

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
                    }
                    reader.readAsDataURL(file);
                } else {
                    $('#error-message').text('Solo imágenes con formato png o jpg.');
                    document.getElementById('imagePreview').style.display = 'none';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

