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
          <h1 class="box-title">
            Lista de Empleados
            <button class="btn btn-success" onclick="mostrarform(true)" id="btnAgregar">
              <i class="fa fa-plus-circle"></i> Agregar
            </button>
          </h1>
        </div>

        <div class="panel-body table-responsive" id="listadoregistros">
          <table id="tbllistado_empleado" class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Documento</th>
              <th>Telefono</th>
              <th>Codigo</th>
            </thead>
            <tbody></tbody>
            <tfoot>
              <th>Opciones</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Documento</th>
              <th>Telefono</th>
              <th>Codigo</th>
            </tfoot>
          </table>
        </div>

        <div class="panel-body" id="form_empleado" style="display:none;">
          <form name="form_empleado" id="form_empleado" method="POST">
            <input type="hidden" name="empleado_id" id="empleado_id">

            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label>Nombre (*)</label>
              <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
            </div>

            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label>Apellidos (*)</label>
              <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
            </div>

            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label>N° Documento</label>
              <input class="form-control" type="text" name="documento_numero" id="documento_numero" maxlength="70" placeholder="documento">
            </div>

            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label>Telefono (*)</label>
              <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="999999999" required>
            </div>

            <div class="form-group col-lg-6 col-md-6 col-xs-12">
              <label>Codigo de asistencia (*)</label>
              <input class="form-control" type="text" name="codigo" id="codigo" maxlength="64" placeholder="Clave asistencia" required>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <button class="btn btn-primary" type="submit" id="btnGuardar_empleado">
                <i class="fa fa-save"></i> Guardar
              </button>

              <button class="btn btn-danger" onclick="cancelarform()" type="button">
                <i class="fa fa-arrow-circle-left"></i> Cancelar
              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>

<script src="scripts/empleado.js"></script>
<?php
require 'footer.php';
ob_end_flush();
?>
