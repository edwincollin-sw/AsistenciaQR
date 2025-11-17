<?php 
require 'header.php';
?>
<!--CONTENIDO -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="row">

      <!-- /.col-md12 -->
      <div class="col-md-12">

        <!--fin box-->
        <div class="box">

          <!--box-header-->
          <div class="box-header with-border">
            <h1 class="box-title">
              Lista de Usuarios
              <button class="btn btn-success" onclick="mostrarform(true)" id="btnAgregar">
                <i class="fa fa-plus-circle"></i> Agregar
              </button>
            </h1>
            <div class="box-tools pull-right"></div>
          </div>
          <!--box-header-->

          <!--tabla para listar datos-->
          <div class="panel-body table-responsive" id="listadoregistros">

            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Login</th>
                <th>Email</th>
                <th>Estado</th>
              </thead>
              <tbody></tbody>
              <tfoot>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Login</th>
                <th>Email</th>
                <th>Estado</th>
              </tfoot>   
            </table>

          </div>
          <!--fin tabla para listar datos-->

          <!--formulario para datos-->
          <div class="panel-body" id="formularioregistros" style="display:none;">
              
              <form name="formulario" id="formulario" method="POST">
                  
                  <input type="hidden" name="idusuario" id="idusuario">
                  
                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                      <label>Nombre (*)</label>
                      <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" required>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                      <label>Apellidos (*)</label>
                      <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" required>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                      <label>Email</label>
                      <input class="form-control" type="email" name="email" id="email" maxlength="70">
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                      <label>Login (*)</label>
                      <input class="form-control" type="text" name="login" id="login" maxlength="20" required>
                  </div>

                  <div class="form-group col-lg-6 col-md-6 col-xs-12">
                      <label>Clave</label>
                      <input class="form-control" type="password" name="clave" id="clave" maxlength="64">
                  </div>

                  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <button class="btn btn-primary" type="submit" id="btnGuardar">
                        <i class="fa fa-save"></i> Guardar
                      </button>

                      <button class="btn btn-danger" onclick="cancelarform()" type="button">
                        <i class="fa fa-arrow-circle-left"></i> Cancelar
                      </button>
                  </div>

              </form>

          </div>
          <!--fin formulario para datos-->

        </div>
        <!--fin box-->

      </div>
      <!-- /.col-md12 -->

    </div>
    <!-- fin Default-box -->

  </section>
  <!-- /.content -->

</div>
<!--FIN CONTENIDO -->

<?php 
require 'footer.php';
?>

<script src="scripts/usuario.js"></script>
