<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos_footer.css">
    <link rel="stylesheet" href="css/estilos_patitas.css">
    <link rel="stylesheet" href="css/iniciar_sesion.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' rel="stylesheet"/>
    <link rel="stylesheet" href="css/popup_register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php require_once('./nav.php'); ?>
    <?php require_once('./header_secondary.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-3">

            </div>
            <div class="col">
                <h2 class="fw-bold text-center py-5">Registro</h2>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
                        require_once('../controllers/C_registrarCliente.php');

                        if($registro == "El registro se ha insertado correctamente.") { ?>
                            <div class="d-flex justify-content-center align-items-center" hidden>
                                <div class="popup" id="success">
                                    <div class="popup-content">
                                        <div class="imgbox">
                                            <img src="img/checked.png" alt="" class="img">
                                        </div>
                                        <div class="title">
                                            <h3>Éxito!</h3>
                                        </div>
                                        <p class="para">Su cuenta ha sido creada con éxito</p>
                                        <a class="button" id="s_button" href="../../../../Integrador/index.php">Aceptar</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                        else if($registro == "Error al insertar el registro.") { ?>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="popup" id="error">
                                    <div class="popup-content">
                                        <div class="imgbox">
                                            <img src="img/cancel.png" alt="" class="img">
                                        </div>
                                        <div class="title">
                                            <h3>Lo siento :(</h3>
                                        </div>
                                        <p class="para">Algo salió mal. ¡Inténtalo de nuevo!</p>
                                        <a href="../../../../Integrador/views/V_RegistrarUsuario.php" class="button" id="e_button">Interar otra vez.</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                ?>

                <!-- Login -->
                <form action="" method="POST">
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" >
                    </div>
                    <h3 class="text-center">Datos personales</h3><br>
                    <div class="mb-4">
                        <label for="nombres" class="form-label">Nombres completos</label>
                        <input type="text" class="form-control" name="Nombres" >
                    </div>
                    <div class="mb-4">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="Apellidos" >
                    </div>
                    <div class="mb-4">
                        <label for="dni" class="form-label">DNI</label>
                        <input type="text" class="form-control" name="DNI" >
                    </div>
                    <div class="mb-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="Celular" >
                    </div>
                    <div class="mb-4">
                        <label for="direccion" class="form-label">Dirección (Opcional)</label>
                        <input type="text" class="form-control" name="Direccion">
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="connected" class="form-check-input" id="">
                        <label for="connected" class="form-check-label"> Mantenerse conectado</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="submit" class="btn btn-primary">Registrarse</button>
                    </div>
                    <div class="my-3">
                        <span>Ya tienes cuenta? <a href="#">Iniciar Sesión</a></span><br>
                        <span><a href="#">Recuperar Password</a></span>
                    </div>
                </form>
                <!-- Login con redes sociales -->
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Registrarse con</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="img/logo_fb.png" width="32" alt="">
                                    </div>

                                    <div class="col-10 text-center">Facebook</div>

                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img src="img/logo-google.png" width="32" alt="">
                                    </div>

                                    <div class="col-10 text-center">Google</div>

                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">

            </div>
            
        </div>
    </div>
    <script src="./js/main.js"></script>
    <?php require_once('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>