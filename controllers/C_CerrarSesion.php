<?php
    session_start();
    session_destroy();
    header("Location: ../../../Integrador/index.php")
?>