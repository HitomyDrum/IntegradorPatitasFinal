<div id="alert_producto_eliminado" class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <span>El producto fue eliminado correctamente.</span>
  <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>

<?php
if(isset($_REQUEST['ac'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones! </strong>El producto fue actualizado correctamente.
  <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<?php
if(isset($_REQUEST['ag'])){ ?>
<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Felicitaciones! </strong>Producto agregado correctamente.
  <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<!-- Mascotas -->
<div id="alert_producto_eliminado" class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="display: none;">
  <span>La Mascota fue eliminado correctamente.</span>
  <button hidden type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
</div>
