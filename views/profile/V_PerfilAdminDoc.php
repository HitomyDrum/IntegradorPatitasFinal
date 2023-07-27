<?php

error_reporting(0);
session_start();

# falta editar el if y poner la web si en caos entran desde el link sin iniciar sesion

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
    <link rel="stylesheet" href="../css/estilos_admin_dashboard.css">
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
                    <!-- Divs flotantes | https://www.bootdey.com/snippets/view/dashboard-border-cards -->
                    <?php require_once("../../controllers/C_obtenerConteoDashboard.php") ?>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Clientes</p>
                                            <h4 class="my-1 text-info"><?php echo $registros_clientes; ?></h4>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-warning">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Mascotas</p>
                                            <h4 class="my-1 text-warning"><?php echo $registros_mascotas; ?></h4>
                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="fa-solid fa-paw"></i></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="col">
                            <div class="card radius-10 border-start border-0 border-3 border-danger">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Ingresos Totales</p>
                                        <h4 class="my-1 text-danger">50</h4>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="fa fa-dollar"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col" hidden>
                            <div class="card radius-10 border-start border-0 border-3 border-success">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <p class="mb-0 text-secondary">Bounce Rate</p>
                                        <h4 class="my-1 text-success">34.6%</h4>
                                        <p class="mb-0 font-13">-4.5% from last week</p>
                                    </div>
                                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa fa-bar-chart"></i>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- últimas transacciones -->
                    <div class="row">
                        <div class="col-12 mb-3 mb-lg-5">
                            <div class="position-relative card table-nowrap table-card">
                                <div class="card-header align-items-center">
                                    <h5 class="mb-0">Latest Transactions</h5>
                                    <p class="mb-0 small text-muted">1 Pending</p>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="small text-uppercase bg-body text-muted">
                                            <tr>
                                                <th>Transaction ID</th>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="align-middle">
                                                <td>
                                                    #57473829
                                                </td>
                                                <td>13 Sep, 2021</td>
                                                <td>Renee Sims</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                                        <span>$145</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge fs-6 fw-normal bg-tint-success text-success">Completed</span>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td>
                                                    #012458780
                                                </td>
                                                <td>19 Aug, 2021</td>
                                                <td>Edith Koenig</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <span>$641.64</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge fs-6 fw-normal bg-tint-warning text-warning">Pending</span>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td>
                                                    #76444326
                                                </td>
                                                <td>03 April, 2021</td>
                                                <td>Carrie Blount</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <span>$12,457</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge fs-6 fw-normal bg-tint-success text-success">Completed</span>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td>
                                                    #12498745
                                                </td>
                                                <td>15 March, 2021</td>
                                                <td>Ander Durham</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><i class="fa fa-arrow-down" aria-hidden="true"></i></span>
                                                        <span>$785</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge fs-6 fw-normal bg-tint-success text-success">Completed</span>
                                                </td>
                                            </tr>
                                            <tr class="align-middle">
                                                <td>
                                                    #87444654
                                                </td>
                                                <td>23 Jan, 2021</td>
                                                <td>Netflix Inc.</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <span><i class="fa fa-arrow-up" aria-hidden="true"></i></span>
                                                        <span>$199</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge fs-6 fw-normal bg-tint-success text-success">Completed</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="#!" class="btn btn-gray">View All Transactions</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

