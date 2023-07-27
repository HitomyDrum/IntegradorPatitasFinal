<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilos_footer.css">
    <link rel="stylesheet" href="css/estilos_patitas.css">
    <link rel="stylesheet" href="css/iniciar_sesion.css">

</head>
<body>
    <?php require_once('./nav.php') ?>
    <?php require_once('./header_secondary.php') ?>
    <div class="container w-75 mt-5 rounded">
        <div class="row align-items-stretch">
            <div class="col d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">
                <div class="image-container">
                    <img src="img/img_inicio_sesion.jpg" class="img-fluid" alt="">
                  </div>
            </div>
            <div class="col bg-white p-4 rounded-end shadow">
                <img src="img/logo.png" width="48" alt="">
                <h2 class="fw-bold text-center py-3">Iniciar Sesión</h2>
                <!-- Login -->
                <form action="../controllers/C_iniciarSesion.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-4 form-check">
                        <input type="checkbox" name="connected" class="form-check-input" id="">
                        <label for="connected" class="form-check-label"> Mantenerse conectado</label>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                    </div>
                    <div class="my-3">
                        <span>Aún no tienes cuenta? <a href="../views/registro.php">Regístrate</a></span><br>
                        <span><a href="#">Recuperar Password</a></span>
                    </div>
                </form>

                <!-- Login con redes sociales -->
                <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Iniciar Sesión con</div>
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
            
        </div>
    </div>
    <?php require_once('footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>