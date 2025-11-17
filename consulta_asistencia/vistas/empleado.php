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
            <h1 class="box-title">Lista de Empleados<button class="btn btn-success"onclick="mostrarform(true)" id="btnAgregar"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
            <div class="box-tools pull-right">
              
            </div>
          </div>
          <!--box-header-->

          <!--centro-->

          <!--tabla para listar datos-->
          <div class="panel-body table-responsive" id="listadoregistros">

            <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
              <thead>
                <th>Opciones</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Documento</th>
                <th>Telefono</th>
                <th>Codigo</th>
              </thead>
              <tbody>
              </tbody>
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
          <!--fin tabla para listar datos-->

          <!--formulatio para datos-->
          <div class="panel-body">
    <form name="formularioregistros" id="formularioregistros" method="POST">
        
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
            <input type="hidden" name="empleado_id" id="empleado_id">
            <label for="">Nombre (*)</label>
            <input class="form-control" type="text" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
            <label for="">Apellidos (*)</label>
            <input class="form-control" type="text" name="apellidos" id="apellidos" maxlength="100" placeholder="Apellidos" required>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
            <label for="">N° Documento</label>
            <input class="form-control" type="txt" name="documento_numero" id="documento_numero" maxlength="70" placeholder="email">
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
            <label for="">Telefono (*)</label>
            <input class="form-control" type="text" name="telefono" id="telefono" maxlength="20" placeholder="999999999" required>
        </div>
        
        <div class="form-group col-lg-6 col-md-6 col-xs-12">
            <label for="">Codigo de asistencia (*)</label>
            <input class="form-control" type="password" name="clave" id="clave" maxlength="64" placeholder="Clave">
        </div>
        
        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
        </div>
        
    </form>
</div>
          <!--fin formulatio para datos-->

          <!--fin centro-->

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

 <script src='scripts/empleado.js'></script>