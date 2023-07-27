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
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">
    <link rel="stylesheet" href="../css/estilos_footer.css">
</head>
<body> <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
    <?php require_once('../nav.php'); ?>
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
                            <form action="../../controllers/C_ActualizarUsuario.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombres</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="nombres_usuario" value="<?php echo $data['NOM_CLI']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Apellidos</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="apellidos_usuario" value="<?php echo $data['APE_CLI']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Correo</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="correo" value="<?php echo $data['EMAIL_CLI']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Pass</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="password" class="form-control pr-3" name="pass" value="<?php echo $data['PASS_CLI']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Celular</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="cell" value="<?php echo $data['TELF_CLI']; ?>" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Dirección</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control pr-3" name="dir" value="<?php echo $data['DIR_CLI']; ?>" required>
                                    </div>
                                </div>
                                <input type="text" class="form-control pr-3" name="dni_cli" value="<?php echo $dni; ?>" hidden>

                                <button type="button" class="btn btn-patitas" data-bs-toggle="modal" data-bs-target="#exampleModal">Guardar Cambios</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres guardar estos datos?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Si</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
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