<?php 
    if(isset($_SESSION['DNI_CLI'])) {
        $session_activa = True;
        $nombre = $_SESSION['NOM_CLI'];

    } else $session_activa = False;

?>
<nav class="navbar">
    <img src="/Integrador/views/img/logo.png" alt="" class="logo-patitas">
    <ul class="nav-links">
        <li><a href="/Integrador/" class="a-nav">Home</a></li>
        <li><a href="https://google.com.pe/" class="a-nav">Visión</a></li>
        <li><a href="" class="a-nav">Servicios</a></li>
        <li class="">
            <?php
                if($session_activa == True) {
                    echo "<a href='/Integrador/views/profile/V_PerfilUsuario.php' class='btn btn-light'>$nombre</a>";
                    echo '<a href="/Integrador/controllers/C_CerrarSesion.php" class="btn btn-patitas">Cerrar Sesión</a>';
                } else {
                    echo '<a href="/Integrador/views/V_IniciarSesion.php" class="btn btn-patitas-transparente">Loguearse</a>';
                    echo '<a href="/Integrador/views/V_RegistrarUsuario.php" class="btn btn-patitas">Registrarse</a>';
                }
            ?>
        </li>
    </ul>
    <label class="icon-menu menu-btn" for="menu-bar"></label>
</nav>