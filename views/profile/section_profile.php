<div class="card mb-4">
    <div class="card-body text-center">
        <img src="../img/perfil.jpg" alt="avatar" class="rounded-circle p-1 bg-primary" style="width: 150px;">
        <h5 class="my-3"><?php echo $data['NOM_CLI']; ?></h5>
        <p class="text-muted mb-4"><?php echo $data['EMAIL_CLI']; ?></p>
        <div class="d-flex justify-content-center mb-2">
        <button type="button" class="btn btn-primary">Editar Perfil</button>
        <a href="../../../Integrador/controllers/C_CerrarSesion.php" class="btn btn-outline-primary ms-1">Cerrar Sesión</a>
        </div>
    </div>
</div>