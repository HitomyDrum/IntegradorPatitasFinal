<?php

    error_reporting(0);
    session_start();

    # falta editar el if y poner la web si en caos entran desde el link sin iniciar sesion

    if(isset($_SESSION['NOM_CLI']) == null || isset($_SESSION['NOM_CLI']) == "") {
        $session_activa = False;
    } else {
        $session_activa = True;
        $nombre = $_SESSION['NOM_CLI'];
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
                    <div>
                        <label for="caja_busqueda">Buscar: </label>
                        <input type="text" name="caja_busqueda" id="caja_busqueda" class="form-control">
                    </div><br>
                    <div class="row">
                        <div class="col msjs">
                            <?php
                            include('./msjs.php');
                            ?>
                        </div>
                    </div>
                    <div class="table-responsive-md">
                        <table class="table table-bordered table-striped table-hover">
                            <caption class="caption">Lista de productos</caption>
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Precio Unitario</th>
                                    <th scope="col">Ruc Proveedor</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="datos">

                            </tbody>
                            <script src="../js/jquery.min.js"></script>
                            <script src="../js/main-buscador.js"></script>
                        </table>
                    </div>
                    <?php require('../../models/Conexion.php'); ?>
                    <div class="row">
                        <div class="col-md">
                            <form action="/Integrador/controllers/C_registrarProducto.php" method="POST">
                                <button type="button" class="btn btn-patitas" data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar Producto</button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Producto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Nombre del producto</h6>
                                                        <input type="text" class="form-control" name="nombre_prod" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Precio Unitario</h6>
                                                        <input type="text" class="form-control" name="precio_uni" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Stock</h6>
                                                        <input type="number" class="form-control" name="stock_pro" required>
                                                    </div>
                                                    
                                                </div>
                                                <?php require_once("../../controllers/C_verProveedoresForm.php") ?>
                                                <div class="row" >
                                                    <div class="col-md-12">
                                                        <h6>Proveedor</h6>
                                                        <select class="form-select" name="ruc_proveedor" required>
                                                            <?php foreach($proveedores as $data) { ?>
                                                                <option value="<?php echo $data['RUC']; ?>"><?php echo $data['RAZON_SOCIAL']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Descripción del producto (opcional)</h6>
                                                        <textarea name="descripcion_prod" id="" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Agregar</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form action="../../controllers/C_ActualizarProducto.php" method="POST">
                                <!-- Modal Editar Producto -->
                                <div class="modal fade" id="editarProductos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Nombre del producto</h6>
                                                        <input  type="text" class="form-control" name="edit_id_prod" id="edit_id_prod" required>
                                                        <input type="text" class="form-control" name="edit_nombre_prod" id="edit_nombre_prod" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Precio Unitario</h6>
                                                        <input type="text" class="form-control" name="edit_precio_uni" id="edit_precio_uni" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6>Stock</h6>
                                                        <input type="number" class="form-control" name="edit_stock_pro" id="edit_stock_pro" required>
                                                    </div>
                                                    
                                                </div>
                                                <?php require_once("../../controllers/C_verProveedoresForm.php") ?>
                                                <div class="row" >
                                                    <div class="col-md-12">
                                                        <h6>Proveedor</h6>
                                                        <select class="form-select" name="edit_ruc_proveedor" id="edit_ruc_proveedor" required>
                                                            <?php foreach($proveedores as $data) { ?>
                                                                <option value="<?php echo $data['RUC']; ?>"><?php echo $data['RAZON_SOCIAL']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Descripción del producto</h6>
                                                        <textarea name="edit_descripcion_prod" id="edit_descripcion_prod" rows="3" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once('../footer.php') ?>
    <script>
        //Oculta mensajes de Notificacion
        setTimeout(function () {
            $(".alert").slideUp(300);
        }, 3000); 
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html> 

