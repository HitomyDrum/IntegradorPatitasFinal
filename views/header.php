<?php 

error_reporting(0);
session_start();

if(isset($_SESSION['NOM_CLI']) == null || isset($_SESSION['NOM_CLI']) == "") {
    $session_activa = False;
} else {
    $session_activa = True;
    $nombre = $_SESSION['NOM_CLI'];
}

?>
<header>
    <div class="contenedor">
        <h1 class="icon-dog">Patitas al rescate</h1>
        <input type="checkbox" id="menu-bar">
        <label class="icon-menu" for="menu-bar"></label>
        <nav class="menu">
            <a href="../../../Integrador/">Inicio</a>
            <a href="">Mascotas</a>
            <?php
                if($session_activa == True) {
                    echo "<a href='../../../Integrador/views/profile/V_PerfilUsuario.php'>$nombre</a>";
                    echo '<a href="../../../Integrador/controllers/C_CerrarSesion.php">Cerrar Sesión</a>';
                } else {
                    echo '<a href="../../../Integrador/views/V_IniciarSesion.php">Loguearse</a>';
                    echo '<a href="../../../Integrador/views/V_RegistrarUsuario.php">Registrarse</a>';
                }
            ?>
        </nav>
    </div>
</header>
