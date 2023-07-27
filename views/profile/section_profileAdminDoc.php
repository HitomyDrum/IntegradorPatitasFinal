<?php session_start(); ?>
<div class="card mb-4">
    <div class="card-body text-center">
        <img src="../img/perfil.jpg" alt="avatar" class="rounded-circle p-1 bg-primary" style="width: 150px;">
        <h5 class="my-3"><?php echo $_SESSION['NAME_ADMIN']; ?></h5>
        <p class="text-muted mb-4">Gerente General</p>
        <div class="d-flex justify-content-center mb-2">
            <div class="badge bg-primary text-wrap p-2" style="width: 6rem;">
            Admistrador
            </div>
        </div>
    </div>
</div>