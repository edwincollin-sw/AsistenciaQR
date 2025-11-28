<?php
ob_start();
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location: login.php");
    exit();
}

require 'header.php';
require_once('../modelos/Usuario.php');

$usuario = new Usuario();
$rsptan = $usuario->cantidad_usuario();
$reg = $rsptan->fetch_object();
$totalUsuarios = isset($reg->total) ? $reg->total : 0;
?>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="panel-body">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="small-box bg-green">
              <a href="asistencia.php" class="small-box-footer">
                <div class="inner">
                  <h5 style="font-size:20px;"><strong>Lista asistencias</strong></h5>
                  <p>Módulo</p>
                </div>
                <div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>
                <div class="small-box-footer"><i class="fa"></i></div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="small-box bg-orange">
              <div class="inner">
                <h4 style="font-size:20px;"><strong>Empleados:</strong></h4>
                <p>Total <?php echo intval($totalUsuarios); ?></p>
              </div>
              <div class="icon"><i class="fa fa-users" aria-hidden="true"></i></div>
              <a href="empleado.php" class="small-box-footer">Agregar <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="small-box bg-aqua">
              <a href="rptasistencia.php" class="small-box-footer">
                <div class="inner">
                  <h5 style="font-size:20px;"><strong>Reporte de asistencias</strong></h5>
                  <p>Módulo</p>
                </div>
                <div class="icon"><i class="fa fa-list" aria-hidden="true"></i></div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php
require 'footer.php';
ob_end_flush();
?>
