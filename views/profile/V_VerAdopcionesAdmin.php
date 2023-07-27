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
                                $sql = "SELECT COUNT(*) as total FROM mascotas_adopcion";
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
                                <h5 class="card-title">Lista de mascotas en adopción <span class="text-muted fw-normal ms-2">(<?php echo $totalRegistros;?>)</span></h5>
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
                        <label for="caja_busqueda_mascotas_adopcion">Buscar por nombre o estado: </label>
                        <input type="text" name="caja_busqueda_mascotas_adopcion" id="caja_busqueda_mascotas_adopcion" class="form-control">
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
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Edad</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Sexo</th>
                                                <th scope="col" style="width: 200px;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datos_mascotas_adopciones">
                                            <tr>
                                                <th scope="row" class="ps-4">
                                                    <div class="form-check font-size-16"><input type="checkbox" class="form-check-input" id="contacusercheck1" /><label class="form-check-label" for="contacusercheck1"></label></div>
                                                </th>
                                                <td><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-sm rounded-circle me-2" /><a href="#" class="text-body">Simon</a></td>
                                                <td>2 años</td>
                                                <td><span class="badge badge-soft-success mb-0">Adoptado</span></td>
                                            
                                                <td>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" class="px-2 text-primary"><i class="bx bx-pencil font-size-18"></i></a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" class="px-2 text-danger"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                        </li>
                                                        <li class="list-inline-item dropdown">
                                                            <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-vertical-rounded"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
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
                            <form id="fileUploadForm" action="/Integrador/controllers/C_registrarMascotaAdopcion.php" method="POST" enctype="multipart/form-data">
                                <button hidden type="button" class="btn btn-patitas" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar nueva mascota</button>
                                <!-- Modal Agregar Mascota-->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar nueva mascota</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Nombre de la mascota</h6>
                                                        <input type="text" class="form-control" name="nombre_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Edad</h6>
                                                        <input type="text" class="form-control" name="edad_mascota" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Raza</h6>
                                                        <input type="text" class="form-control" name="raza_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Sexo</h6>
                                                        <select class="form-select" name="sexo_mascota" id="sexo_mascota" required>
                                                            <option value="Macho">Macho</option>
                                                            <option value="Hembra">Hembra</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-md-6">
                                                        <h6>Color</h6>
                                                        <input type="text" class="form-control" name="color_mascota" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Mascota</h6>
                                                        <select class="form-select" name="tipo_mascota" id="tipo_mascota" required>
                                                            <option value="Gato">Gato</option>
                                                            <option value="Perro">Perro</option>
                                                            <option value="Loro">Loro</option>
                                                            <option value="Hamster">Hamster</option>
                                                            <option value="Otros">Otros</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"></div>
                                                    <div class="col-md-6">
                                                        <h6>Nombre del tutor</h6>
                                                        <input type="text" class="form-control" name="tutor_mascota" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md">
                                                        <h6>Descripción (máx 150 palabras)</h6>
                                                        <textarea class="form-control" name="desc_mascota" id="desc_mascota" rows="4" required>• Cachorro amistoso y juguetón</textarea>
                                                    </div>
                                                </div>
                                                <!--Image-->
                                                <br>
                                                <div class="container" >
                                                    <div class="form-group">
                                                        <label for="fileToUpload"><h6>Foto</h6></label>
                                                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
                                                        <div id="error-message" class="alert"></div>
                                                    </div>
                                                    <br>
                                                    <img id="imagePreview" src="">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success" name="submit">Agregar mascota</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

