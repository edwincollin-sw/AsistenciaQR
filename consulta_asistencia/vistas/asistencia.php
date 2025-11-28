<?php
ob_start();
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

require 'header.php';
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h1 class="box-title">Lista de asistencia</h1>
        </div>

        <div class="panel-body table-responsive" id="listadoregistros">
          <table id="tbllistado_asistencia" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>#</th>
              <th>Codigo</th>
              <th>Empleado</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Tipo</th>
            </thead>
            <tbody></tbody>
            <tfoot>
              <th>#</th>
              <th>Codigo</th>
              <th>Empleado</th>
              <th>Fecha</th>
              <th>Hora</th>
              <th>Tipo</th>
            </tfoot>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="scripts/asistencia.js"></script>
<?php
require 'footer.php';
ob_end_flush();
?>
