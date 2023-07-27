<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Patitas al Rescate</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="views/css/fontello.css">
    <link rel="stylesheet" href="views/css/style.css">
    <link rel="stylesheet" href="views/css/estilos_footer.css">
    <link rel="stylesheet" href="views/css/estilos_patitas.css">

</head>
<body>
    <?php # require_once('views/header.php') ?>
    <header>
        <div class="navbar">
            <div class="logo"><a href="">LOGO</a></div>
            <ul class="links">
                <li><a href="">Home</a></li>
                <li><a href="">Visión</a></li>
                <li><a href="">Servicios</a></li>
                <li><a href="">Contacto</a></li>
            </ul>
            <a href="" class="action_btn">Comenzar</a>
            <div class="toggle_btn">
                <i class="fa-regular fa-bars"></i>
            </div>
        </div>
        <div class="header-content" >
            <h2>PATITAS</h2>
            <div class="line"></div>
            <h1>¡AL RESCATE!</h1>
            <a href="#" class="btn btn-patitas">Comienza ahora</a>
        </div>
    </header>
    <?php # require_once('views/main.php') ?>
    <?php require_once('views/footer.php') ?>
    <script>
        const menuBtn = document.querySelector('.menu-btn')
        const navlinks = document.querySelector('.nav-links')

        menuBtn.addEventListener('click',()=>{
            navlinks.classList.toggle('mobile-menu')
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 