<?php

error_reporting(0);
session_start();

# falta editar el if y poner la web si en caos entran desde el link sin iniciar sesion

if(isset($_SESSION['NOM_CLI']) == null || isset($_SESSION['NOM_CLI']) == "") {
    $session_activa = False;
} else {
    $session_activa = True;
    $nombre = $_SESSION['NOM_CLI'];
    $apellidos = $_SESSION['APE_CLI'];
    $email = $_SESSION['EMAIL_CLI'];
    $cell = $_SESSION['TELF_CLI'];
    $dni = $_SESSION['DNI_CLI'];
    $dir = $_SESSION['DIR_CLI'];
    $fech_registro = $_SESSION['FECH_REGISTRO'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/fontello.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/estilos_patitas.css">

    <link rel="stylesheet" type="text/css" href="../css/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/home.css">

</head>
<body> <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
    <?php require_once('../nav.php') ?>
    <?php require_once('../header_secondary.php') ?>
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4">
                    <?php require_once("./section_profileAdminDoc.php") ?>
                    <?php require_once("./section_links.php") ?>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project
                                        Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project
                                        Status
                                    </p>
                                    <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 72%"
                                            aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 89%"
                                            aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                                    <div class="progress rounded" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 55%"
                                            aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                                    <div class="progress rounded mb-2" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 66%"
                                            aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                        include('calendario/config.php');

                        $SqlEventos   = ("SELECT * FROM eventoscalendar");
                        $resulEventos = mysqli_query($con, $SqlEventos);

                    ?>
                    <div class="row">
                        <div class="col msjs">
                            <?php
                            include('calendario/msjs.php');
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <h3 class="text-center" id="title">Calendario de Eventos</h3>
                        </div>
                    </div>
                    <div id="calendar"></div>
                        <?php  
                            include_once('calendario/modalNuevoEvento.php');
                            include_once('calendario/modalUpdateEvento.php');
                        ?>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    
    <script src="../js/jquery-3.0.0.min.js"> </script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../js/moment.min.js"></script>
    <script type="text/javascript" src="../js/fullcalendar.min.js"></script>
    <script src='../locales/es.js'></script>

    <script type="text/javascript">
    $(document).ready(function () {
        $("#calendar").fullCalendar({
        header: {
            left: "prev,next today",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        },

        locale: 'es',

        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Nuevo Evento
        select: function (start, end) {
            $("#exampleModal").modal();
            $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

            var valorFechaFin = end.format("DD-MM-YYYY");
            var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
            $('input[name=fecha_fin').val(F_final);

        },

        events: [
        <?php
        while($dataEvento = mysqli_fetch_array($resulEventos)) { ?>
        {
            _id: '<?php echo $dataEvento['id']; ?>',
            title: '<?php echo $dataEvento['evento']; ?>',
            start: '<?php echo $dataEvento['fecha_inicio']; ?>',
            end: '<?php echo $dataEvento['fecha_fin']; ?>',
            color: '<?php echo $dataEvento['color_evento']; ?>'
            },
            <?php } ?>
        ],


        //Eliminar Evento
        eventRender: function (event, element) {
            element
            .find(".fc-content")
            .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");

            //Eliminar evento
            element.find(".closeon").on("click", function () {

            var pregunta = confirm("Deseas Borrar este Evento?");
            if (pregunta) {

                $("#calendar").fullCalendar("removeEvents", event._id);

                $.ajax({
                type: "POST",
                url: 'calendario/deleteEvento.php',
                data: { id: event._id },
                success: function (datos) {
                    $(".alert-danger").show();

                    setTimeout(function () {
                    $(".alert-danger").slideUp(500);
                    }, 3000);

                }
                });
            }
            });
        },


        //Moviendo Evento Drag - Drop
        eventDrop: function (event, delta) {
            var idEvento = event._id;
            var start = (event.start.format('DD-MM-YYYY'));
            var end = (event.end.format("DD-MM-YYYY"));

            $.ajax({
            url: 'drag_drop_evento.php',
            data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
            type: "POST",
            success: function (response) {
                // $("#respuesta").html(response);
            }
            });
        },

        //Modificar Evento del Calendario 
        eventClick: function (event) {
            var idEvento = event._id;
            $('input[name=idEvento').val(idEvento);
            $('input[name=evento').val(event.title);
            $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
            $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

            $("#modalUpdateEvento").modal();
        },


    });


    //Oculta mensajes de Notificacion
    setTimeout(function () {
        $(".alert").slideUp(300);
    }, 3000); 


    });
    </script>
</body>
</html> 

