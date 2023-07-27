<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veterinaria Patitas al Rescate</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <link rel="stylesheet" href="views/css/estilos_footer.css">
  <link rel="stylesheet" href="views/css/estilos_patitas.css">
  <link rel="stylesheet" href="./views/css/estilos_loginAdminDoc.css">
  <link rel="stylesheet" href="views/css/style.css"> <!-- Esto distorsiona la web, reparar algo del css-->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Para la tecla F8 -->
  <script>
      $(document).ready(function() {
          $(document).on("keydown", function(event) {
              if (event.which == 119) { // Código de la tecla F8
                  wrapper.classList.add('active-popup')
              }
          });
      });
  </script>
  <!-- Google font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Titillium+Web:400,400i,600,600i,700,700i,900">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i">
  
  <!-- carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">

  <style>
      .blog_section {
        padding-top: 5rem;
        padding-bottom: 3rem;
      }
      .blog_section .blog_content .blog_item {
        margin-bottom: 30px;
        box-shadow: 0 0 11px 0 rgba(6, 22, 58, 0.14);
        position: relative;
        border-radius: 2px;
        overflow: hidden;
      }
      .blog_section .blog_content .blog_item:hover .blog_image img {
        transform: scale(1.1);
      }
      .blog_section .blog_content .blog_item .blog_image {
        overflow: hidden;
        padding: 0;
      }
      .blog_section .blog_content .blog_item .blog_image img {
        width: 100%;
        transition: transform 0.5s ease-in-out;
      }
      .blog_section .blog_content .blog_item .blog_image span i {
        position: absolute;
        z-index: 2;
        color: #fff;
        font-size: 18px;
        width: 38px;
        height: 45px;
        padding-top: 7px;
        text-align: center;
        right: 20px;
        top: 0;
        -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
        clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 79%, 0 100%);
        background-color: #fc036b;
      }
      .blog_section .blog_content .blog_item .blog_details {
        padding: 25px 20px 30px 20px;
      }
      .blog_section .blog_content .blog_item .blog_details .blog_title h5 a {
        color: #020d26;
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 25px;
        line-height: 32px;
        font-weight: 400;
        transition: all 0.3s;
        text-decoration: none;
      }
      .blog_section .blog_content .blog_item .blog_details .blog_title h5 a:hover {
        color: #fc036b;
      }
      .blog_section .blog_content .blog_item .blog_details ul {
        padding: 0 3px 10px 0;
        margin: 0;
      }
      .blog_section .blog_content .blog_item .blog_details ul li {
        display: inline-block;
        padding-right: 15px;
        position: relative;
        color: #7f7f7f;
      }
      .blog_section .blog_content .blog_item .blog_details ul li i {
        padding-right: 7px;
      }
      .blog_section .blog_content .blog_item .blog_details p {
        border-top: 1px solid #e5e5e5;
        margin-top: 4px;
        padding: 20px 0 4px;
      }
      .blog_section .blog_content .blog_item .blog_details a {
        font-size: 16px;
        display: inline-block;
        color: #fc036b;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
      }
      .blog_section .blog_content .blog_item .blog_details a:hover {
        color: #020d26;
      }
      .blog_section .blog_content .blog_item .blog_details a i {
        vertical-align: middle;
        font-size: 20px;
      }
      .blog_section .blog_content .owl-nav {
        display: block;
      }
      .blog_section .blog_content .owl-nav .owl-prev {
        position: absolute;
        left: -27px;
        top: 33%;
        border: 5px solid #fff;
        text-align: center;
        z-index: 5;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        outline: 0;
        background: #fc036b;
        transition: all 0.3s;
        color: #fff;
      }
      .blog_section .blog_content .owl-nav .owl-prev span {
        font-size: 25px;
        margin-top: -6px;
        display: inline-block;
      }
      .blog_section .blog_content .owl-nav .owl-prev:hover {
        background: #fff;
        border-color: #fc036b;
        color: #fc036b;
      }
      .blog_section .blog_content .owl-nav .owl-next {
        position: absolute;
        right: -27px;
        top: 33%;
        border: 5px solid #fff;
        text-align: center;
        z-index: 5;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        outline: 0;
        background: #fc036b;
        color: #fff;
        transition: all 0.3s;
      }
      .blog_section .blog_content .owl-nav .owl-next span {
        font-size: 25px;
        margin-top: -6px;
        display: inline-block;
      }
      .blog_section .blog_content .owl-nav .owl-next:hover {
        background: #fff;
        border-color: #fc036b;
        color: #fc036b;
      }

      @media only screen and (max-width: 577px) {
        .blog_section .owl-nav .owl-prev {
          left: -17px !important;
        }
        .blog_section .owl-nav .owl-next {
          right: -17px !important;
        }
      }
  </style>
</head>
<body>
  <?php require_once('./views/nav.php') ?>
  <?php require_once('./views/V_IniciarSesionAdmin.php') ?>
  <?php require_once('./views/header_new.php') ?>
  
  <section class="blog_section">
      <div class="container">
        <h2 class="text-secondary">Mascotas en adopción</h2>
        <div class="blog_content">
          <div class="owl-carousel owl-theme">
            <?php
            require_once('./controllers/C_verAdopMascotasIndexAdmin.php');
            foreach($mascotasAdopcionIndex as $data) { ?>
            <div class="blog_item">
              <div class="blog_image">
                  <img class="img-fluid" src="./views/img/pets_adoption/<?php echo $data['IMG_PATH']; ?>" alt="images not found">
                  <span><i class="fa-solid fa-paw"></i></span>
              </div>
              <div class="blog_details">
                  <div class="blog_title">
                      <h5><a href="#"><?php echo $data['NAME_PET']; ?></a><span class="h6"> (<?php echo $data['EDAD_PET']; ?>)</span></h5>
                  </div>
                  <ul>
                      <li><i class="icon ion-md-person"></i><?php echo $data['TUTOR']; ?></li>
                      <?php
                        // Convierte la cadena a un objeto de fecha
                        $fecha = new DateTime($data['FECH_CREA']);

                        // Formatea la fecha en el formato deseado "Mes dia, año"
                        $formattedDate = $fecha->format("F j, Y");
                      ?>
                      <li><i class="icon ion-md-calendar"></i><?php echo $formattedDate; ?></li>
                  </ul>
                  <p><?php echo $data['DESCRIPCION']; ?></p>
                  <a href="#">¡ADOPTAR AHORA!<i class="icofont-long-arrow-right"></i></a>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
  </section>
  <?php require_once('views/footer.php') ?>
  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <!-- bootstrap -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <!-- carousel -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

  <!-- Scrip F8 -->
  <script src="./views/js/script_loginAdmin.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const menuBtn = document.querySelector('.menu-btn')
    const navlinks = document.querySelector('.nav-links')

    menuBtn.addEventListener('click',()=>{
        navlinks.classList.toggle('mobile-menu')
    })
      
      $('.owl-carousel').owlCarousel({
          loop:true,
          margin:10,
          dots:false,
          nav:true,
          autoplay:true,   
          smartSpeed: 3000, 
          autoplayTimeout:7000,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:2
              },
              1000:{
                  items:3
              }
          }
      })
  </script>    
</body>
</html>