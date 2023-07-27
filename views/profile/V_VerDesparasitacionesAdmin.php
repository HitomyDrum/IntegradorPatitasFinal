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
    <script src="/Integrador/views/js/form_date.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project
                                        Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project
                                        Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="col-md d-flex justify-content-between align-items-center ms-4">
                                <p class="text-muted">Nombre Vacuna</p>
                                <p class="text-muted">Fecha Programada</p>
                                <p class="text-muted">Hora Cita</p>
                                <p class="text-muted">Precio Final</p>
                            </div>
                        </div>
                    </div>
                    <?php
                    require_once('../../controllers/C_verDesparasitacionesAdmin.php');
                    foreach($desparasitaciones as $data) { ?>
                    <div class="row mb-1">
                        <div class="col-md">
                            <div class="card mb-4 mb-lg-0">
                                <div class="card-body d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0"><?php echo $data['NOM_DESP']; ?></p>
                                    <p class="mb-0"><?php echo $data['FECH_CITA']; ?></p>
                                    <p class="mb-0"><?php echo $data['HORA_CITA']; ?></p>
                                    <p class="mb-0">S/<?php echo $data['PRECIO_FINAL']; ?></p>
                                    <i class="fa-solid fa-trash fa-lg" style="color: red;"></i>
                                </div> 
                            </div>  
                        </div>
                    </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-md">
                            <form action="/Integrador/controllers/C_registrarDesparasitacion.php" method="POST">
                                <button type="button" class="btn btn-patitas" data-bs-toggle="modal" data-bs-target="#exampleModal">Programar Desparasitación</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="exampleModalLabel">Programar Desparasitación</h3>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <?php require_once("../../controllers/C_verMascotasForm.php") ?>
                                                    <?php require_once("../../controllers/C_verVeterinariosForm.php") ?>
                                                    <div class="col-md-6">
                                                        <h6>Mascota</h6>
                                                        <select class="form-select" name="id_pet" required>
                                                            <?php foreach($mascotas_form as $data) { ?>
                                                                <option value="<?php echo $data['ID_PET']; ?>"><?php echo $data['NAME_PET']; ?> (<?php echo $data['TIPO_PET']; ?>)- [<?php echo $data['DNI_CLI']; ?>]</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Veterinario</h6>
                                                        <select class="form-select" name="dni_vet" required>
                                                            <?php foreach($veterinarios_form as $data) { ?>
                                                                <option value="<?php echo $data['DNI_VET']; ?>"><?php echo $data['NAME_VET']; ?> <?php echo $data['APE_VET']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Nombre de la desparasitación</h6>
                                                        <input type="text" class="form-control" name="nombre_desparasitacion" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <?php require_once("../../controllers/C_verProductosForm.php") ?>
                                                    <div class="col-md-6">
                                                        <h6>Producto</h6>
                                                        <select class="form-select" name="id_producto" required>
                                                            <?php foreach($productos_form as $data) { ?>
                                                                <option value="<?php echo $data['ID_PROD']; ?>"><?php echo $data['NOM_PROD']; ?>- S/<?php echo $data['PREC_UNIT']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Precio de la aplicación</h6>
                                                        <input type="number" class="form-control" name="precio_aplicacion" required>
                                                    </div>
                                                </div>
                                                <h3>Cita</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Fecha</h6>
                                                        <input type="date" class="form-control" id="myDate" name="fecha_cita" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Hora</h6>
                                                        <input type="time" class="form-control" name="hora_cita" required>
                                                    </div>
                                                </div>
                                                <?php require_once("../../controllers/C_verProveedoresForm.php") ?>
                                                <div class="row" hidden>
                                                    <div class="col-md-12">
                                                        <h6>Proveedor</h6>
                                                        <select class="form-select" name="ruc_proveedor" required>
                                                            <?php foreach($proveedores as $data) { ?>
                                                                <option value="<?php echo $data['RUC']; ?>"><?php echo $data['RAZON_SOCIAL']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Agendar Cita</button>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

