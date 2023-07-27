<?php

    session_start();

    # falta editar el if y poner la web si en caos entran desde el link sin iniciar sesion

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
    <title>Perfil</title>
    <script src="/Integrador/views/js/form_date.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/estilos_chatbot.css">
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body> <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
    <?php require_once('../nav.php') ?>
    <?php require_once('../header_secondary.php') ?>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <?php require_once('../../controllers/C_verCliente.php'); ?>
                    <?php $data = verCliente($dni); ?>
                    <?php require_once("./section_profile.php"); ?>
                    <?php require_once("./section_pets.php"); ?> <!-- De acá jala la base de datos de la lista de mascotas -->
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <h2 class="mt-3 text-center text-secondary">Agendar Cita</h2>
                        <div class="card-body">
                            <form action="../../controllers/C_registrarCitaUsuario.php" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Mascota</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="id_pet" required>
                                            <?php
                                                foreach($clientes as $user) { ?>
                                                <option value="<?php echo $user['ID_PET']; ?>"><?php echo $user['NAME_PET']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Veterinario disponible</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <select class="form-select" name="dni_vet" required>
                                            <?php
                                                require_once('../../controllers/C_verVeterinariosForm.php');
                                                
                                                foreach($veterinarios_form as $veterinarios_form) { 
                                                    // Array para convertir los nombres de los días a números
                                                    $dias_a_numeros = [
                                                        'lunes' => 1,
                                                        'martes' => 2,
                                                        'miercoles' => 3,
                                                        'jueves' => 4,
                                                        'viernes' => 5,
                                                        'sabado' => 6,
                                                        'domingo' => 7
                                                    ];

                                                    // Suponiendo que estos son los días de comienzo y fin
                                                    $dia_comienzo = $veterinarios_form['DIA_INI'];
                                                    $dia_fin = $veterinarios_form['DIA_FIN'];

                                                    // Convierte los días a números
                                                    $numero_comienzo = $dias_a_numeros[strtolower($dia_comienzo)];
                                                    $numero_fin = $dias_a_numeros[strtolower($dia_fin)];

                                                    // Obtén el día actual
                                                    $dia_actual = date("N");

                                                    // Verifica si el día actual está entre los días de comienzo y fin
                                                    if ($numero_comienzo <= $dia_actual && $dia_actual <= $numero_fin) { 
                                                        #$estado = "[Disponible]";?>
                                                        <option value="<?php echo $veterinarios_form['DNI_VET']; ?>"><?php echo $veterinarios_form['NAME_VET'] . " - " .$veterinarios_form['ESPEC_VET']; ?></option>
                                                    <?php
                                                    } else { 
                                                        #$estado = "[No Disponible]";?>
                                                        <option value="<?php echo $veterinarios_form['DNI_VET']; ?>" disabled><?php echo $veterinarios_form['NAME_VET'] . " - " .$veterinarios_form['ESPEC_VET']; ?></option>

                                                    <?php
                                                    }
                                                    
                                                    ?>

                                                    
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Día de la cita</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <h6>Fecha</h6>
                                        <input type="date" class="form-control" id="fecha_cita" name="fecha_cita" required>
                                    </div>
                                </div><br>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Observación</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <textarea class="form-control pr-3" name="textarea_observacion" id="" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Comentario</p>
                                    </div>
                                    <div class="col-sm-5">
                                        <textarea class="form-control pr-3" name="textarea_comentario" id="" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg btn-success">Agendar Cita</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    <!-- https://codepen.io/fajarnurwahid/pen/XWzPQZe -->
    <div class="chatbox-wrapper">
		<div class="chatbox-toggle">
			<i class='bx bx-message-dots'></i>
		</div>
		<div class="chatbox-message-wrapper">
			<div class="chatbox-message-header">
				<div class="chatbox-message-profile">
					<img src="../img/logo.png" alt="" class="chatbox-message-image">
					<div>
						<h4 class="chatbox-message-name">Doc. Veterinario IA</h4>
						<p class="chatbox-message-status">online</p>
					</div>
				</div>
				<div class="chatbox-message-dropdown">
					<i class='bx bx-dots-vertical-rounded chatbox-message-dropdown-toggle'></i>
					<ul class="chatbox-message-dropdown-menu">
						<li>
							<a href="#">Search</a>
						</li>
						<li>
							<a href="#">Report</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="chatbox-message-content">
				<h4 class="chatbox-message-no-message">Escribe tu mensaje al Veterinario</h4>
				<!-- <div class="chatbox-message-item sent">
					<span class="chatbox-message-item-text">
						Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
					</span>
					<span class="chatbox-message-item-time">08:30</span>
				</div>
				<div class="chatbox-message-item received">
					<span class="chatbox-message-item-text">
						Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Quod, fugiat?
					</span>
					<span class="chatbox-message-item-time">08:30</span>
				</div> -->
			</div>
			<div class="chatbox-message-bottom">
				<form action="#" class="chatbox-message-form">
					<textarea rows="1"  placeholder="Escribir consulta..." class="chatbox-message-input"></textarea>
					<button type="submit" class="chatbox-message-submit"><i class='bx bx-send' ></i></button>
				</form>
			</div>
		</div>
	</div>

    <script src="../js/script_chatbot.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>