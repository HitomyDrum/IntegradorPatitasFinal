<div class="card mb-4 mb-lg-0">
    <div class="card-body p-0">
        <ul class="list-group list-group-flush rounded-3">
        <li class="list-group-item d-flex justify-content-center align-items-center p-3">
            <a href="../../../Integrador/views/profile/V_RegistrarMascota.php" class="btn btn-success">Agregar Mascota</a>
        </li>
        <?php
            require_once('../../controllers/C_verPets.php');
            foreach($clientes as $user) { ?>
                <li class="list-group-item d-flex justify-content-center align-items-center p-3">
                    <div class="flex-grow-1 ms-1">
                        <h5 class="mb-1"><?php echo $user['NAME_PET']; ?></h5>
                        <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $user['TIPO_PET']; ?></p>
                        <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                            <div>
                                <p class="small text-muted mb-1">Edad</p>
                                <p class="mb-0"><?php echo $user['EDAD_PET']; ?></p>
                            </div>
                            <div class="px-3">
                                <p class="small text-muted mb-1">Raza</p>
                                <p class="mb-0"><?php echo $user['RAZA_PET']; ?></p>
                            </div>
                            <div>
                                <p class="small text-muted mb-1">Color</p>
                                <p class="mb-0"><?php echo $user['COLOR_PET']; ?></p>
                            </div>
                        </div>
                        <div class="d-flex pt-1" hidden>
                            <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Eliminar Mascota</button>
                        </div>
                        <div class="d-flex pt-1" hidden>
                            <a href="../../../Integrador/views/profile/V_AgendarCitaUsuario.php" class="btn btn-primary me-1 flex-grow-1">Agendar cita</a>
                        </div>
                    </div>
                </li>
            <?php }
        ?>
        </ul>
    </div>
</div>