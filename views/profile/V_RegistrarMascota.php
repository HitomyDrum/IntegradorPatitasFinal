<?php

error_reporting(0);
session_start();

if(isset($_SESSION['NOM_CLI']) == null || isset($_SESSION['NOM_CLI']) == "") {
    $session_activa = False;
} else {
    $session_activa = True;
    $nombre = $_SESSION['NOM_CLI'];
    $dni = $_SESSION['DNI_CLI'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">
    <link rel="stylesheet" href="../css/estilos_footer.css">
</head>
<body> <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
    <?php require_once('../nav.php') ?>
    <?php require_once('../header_secondary.php'); ?>
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <?php require_once('../../controllers/C_verCliente.php'); ?>
                    <?php $data = verCliente($dni); ?>
                    <?php require_once("./section_profile.php") ?>
                    <?php require_once("./section_pets.php") ?>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="/Integrador/controllers/C_registrarMascota.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mascota</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="tipo_mascota" required>
                                            <option selected>Seleccionar tipo de mascota</option>
                                            <option value="Gato">Gato</option>
                                            <option value="Perro">Perro</option>
                                            <option value="Loro">Loro</option>
                                            <option value="Hamster">Hamster</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre (Apodo)</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="nombre_mascota" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Edad</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="edad_mascota">
                                            <option selected>Seleccionar la edad</option>
                                            <?php
                                                for($i = 1; $i <= 12; $i++) { 
                                                    if($i == 1) $textMes = "Mes";
                                                    else $textMes = "Meses";
                                                    $textoEdad = "$i $textMes"
                                                    ?>
                                                    <option value="<?php echo $textoEdad; ?>"><?php echo $textoEdad; ?></option>
                                
                                                <?php }
                                            ?>
                                            <?php
                                                for($i = 13; $i <= 33; $i++) { 
                                                    $años++;
                                                    if($años == 1) $textMes = "Año";
                                                    else $textMes = "Años";
                                                    $textoEdad = "$años $textMes"
                                                    ?>
                                                    <option value="<?php echo $textoEdad; ?>"><?php echo $textoEdad; ?></option>
                                
                                                <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Raza</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="raza_mascota" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Color</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="color_mascota" required>
                                    </div>
                                </div>
                                <input type="text" class="form-control pr-3" name="dni_cli" value="<?php echo $dni; ?>" hidden>
                                <button type="submit" class="btn btn-success">Agregar</button>
                            </form>
                        </div>
                    </div>
                    <div class="row" hidden>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                            </p>
                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                            <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4 mb-md-0">
                        <div class="card-body">
                            <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                            </p>
                            <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                            <div class="progress rounded" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                            <div class="progress rounded mb-2" style="height: 5px;">
                            <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        </div>
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