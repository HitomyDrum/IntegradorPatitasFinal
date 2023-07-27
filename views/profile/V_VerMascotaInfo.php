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
    <link rel="stylesheet" href="../css/estilos_mascotas.css">
    <link rel="stylesheet" href="../css/estilos_estados.css">
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
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7">
                                            <img src="../img/perfil_pet_test.jpg" alt="" class="img-fluid img-thumbnail w-100 h-80">
                                            
                                        </div>
                                        <div class="col-5">
                                            <?php 
                                                $idPet = $_GET['idPet'];
                                                require('../../models/Conexion.php');

                                                $con = new Conexion();

                                                $query = $con->con->query("SELECT m.*, c.DNI_CLI, c.APE_CLI, c.TELF_CLI, c.DIR_CLI
                                                    FROM mascotas m
                                                    JOIN clientes c ON m.DNI_CLI = c.DNI_CLI
                                                    WHERE m.ID_PET = $idPet;
                                                ;");

                                                $fila = $query->fetch_assoc()
                                            ?> <a href="V_VerMascotaInfo.php?idPet="></a>
                                            <p><strong>Nombre:</strong> <span class="fst-italic"><?php echo $fila['NAME_PET']; ?></span></p>
                                            <p><strong>Edad:</strong> <span class="fst-italic"><?php echo $fila['EDAD_PET']; ?></span></p>
                                            <p><strong>Color:</strong> <span class="fst-italic"><?php echo $fila['COLOR_PET']; ?></span></p>
                                            <p><strong>Raza:</strong> <span class="fst-italic"><?php echo $fila['RAZA_PET']; ?></span></p>
                                            <p><strong>Sexo:</strong> <span class="fst-italic">Macho</span></p>
                                            <div class="estado saludable" style="width: 10rem;">
                                                Saludable
                                            </div>
                                            
                                        </div>
                                    </div><br>
                                    <div class="alert alert-primary" role="alert">
                                        <p><strong>Dueño: </strong><?php echo $fila['NOM_CLI']; ?> <?php echo $fila['APE_CLI']; ?> <strong>(<?php echo $fila['DNI_CLI']; ?>)</strong></p>
                                        <p><strong>Dirección: </strong><?php echo $fila['DIR_CLI']; ?></p>
                                        <strong>Contacto: </strong>+51 <?php echo $fila['TELF_CLI']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <h3><small class="text-muted">Más información</small></h3>
                                    <p><strong>N° de Vacunas: </strong>5</p>
                                    <p><strong>N° de baños/peliquerias: </strong>6</p>
                                    <p><strong>N° de desparasitaciones: </strong>3</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $nombre_mascota = $fila['NAME_PET']; ?>
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-striped table-hover">
                            <caption>Vacunas de <?php echo $nombre_mascota; ?></caption>
                            <thead>
                                <tr class="bg-success  text-white">
                                    <th scope="col">N°</th>
                                    <th scope="col">Vacuna</th>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Fecha de la cita</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once('../../controllers/C_verVacunasMascota.php');
                                $i = 0;
                                foreach($vacunas as $data) { 
                                    $i++;
                                    if ($data['ESTADO'] == 0)
                                        $estado_pet = "Pendiente";
                                    if ($data['ESTADO'] == 1)
                                        $estado_pet = "Completada";
                                    if ($data['ESTADO'] == 2)
                                        $estado_pet = "No pagada";
                                ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $i; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['NOM_VACUNA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CREA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CITA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['HORA_CITA']; ?></td>
                                    <td class="text-center align-middle"><div class="estado pendiente"><?php echo $estado_pet; ?></div></td>
                                    <td class="text-center align-middle"><?php echo $data['PRECIO_FINAL']; ?></td>
                                </tr>

                            <?php } ?>
                            
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-striped table-hover">
                            <caption>Desparasitaciones de <?php echo $nombre_mascota; ?></caption>
                            <thead>
                                <tr class="bg-warning">
                                    <th scope="col">N°</th>
                                    <th scope="col">Desparasitación</th>
                                    <th scope="col">Fecha creación</th>
                                    <th scope="col">Fecha de la cita</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once('../../controllers/C_verDesparasitacionesMascota.php');
                                $i = 0;
                                foreach($desparasitaciones as $data) { 
                                    $i++;
                                    if ($data['ESTADO'] == 0)
                                        $estado_pet = "Pendiente";
                                    if ($data['ESTADO'] == 1)
                                        $estado_pet = "Completada";
                                    if ($data['ESTADO'] == 2)
                                        $estado_pet = "No pagada";
                                ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $i; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['NOM_DESP']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CREA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CITA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['HORA_CITA']; ?></td>
                                    <td class="text-center align-middle"><div class="estado pendiente"><?php echo $estado_pet; ?></div></td>
                                    <td class="text-center align-middle"><?php echo $data['PRECIO_FINAL']; ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <br> <!--- Estéticas --->
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-striped table-hover">
                            <caption>Baños y/o cortes de <?php echo $nombre_mascota; ?></caption>
                            <thead>
                                <tr class="bg-info">
                                    <th scope="col">N°</th>
                                    <th scope="col">Baños/Cortes</th>
                                    <th scope="col">Fecha creada</th>
                                    <th scope="col">Fecha cita</th>
                                    <th scope="col">H. inicio - fin</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                require_once('../../controllers/C_verEsteticasMascota.php');
                                $i = 0;
                                foreach($esteticas as $data) { 
                                    $i++;
                                    if ($data['ESTADO'] == 0)
                                        $estado_pet = "Pendiente";
                                    if ($data['ESTADO'] == 1)
                                        $estado_pet = "Completada";
                                    if ($data['ESTADO'] == 2)
                                        $estado_pet = "No pagada";
                                ?>
                                <tr>
                                    <td class="text-center align-middle"><?php echo $i; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['NAME_ETIPOS']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CREA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['FECH_CITA']; ?></td>
                                    <td class="text-center align-middle"><?php echo $data['HORA_INICIO']; ?>-<?php echo $data['HORA_FIN']; ?></td>
                                    <td class="text-center align-middle"><div class="estado pendiente"><?php echo $estado_pet; ?></div></td>
                                    <td class="text-center align-middle"><?php echo $data['PRECIO_FINAL']; ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

