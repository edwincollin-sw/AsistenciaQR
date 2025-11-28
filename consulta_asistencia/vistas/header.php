<?php
if (session_status() == PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo defined('PRO_NOMBRE') ? PRO_NOMBRE : 'Asistencia QR'; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <link rel="stylesheet" href="../public/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">
  <link rel="stylesheet" href="../public/css/bootstrap-select.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="escritorio.php" class="logo">
        <span class="logo-mini"><b>C</b>C</span>
        <span class="logo-lg"><b>C</b>ÓDIGOS</span>
      </a>

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php $img = isset($_SESSION['imagen']) ? $_SESSION['imagen'] : 'default.png'; ?>
                <img src="../files/usuarios/<?php echo htmlspecialchars($img); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'Invitado'; ?></span>
              </a>

              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="../files/usuarios/<?php echo htmlspecialchars($img); ?>" class="img-circle" alt="User Image">
                  <p>
                    <?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'Asistencia QR'; ?>
                    <small><?php echo date("Y"); ?></small>
                  </p>
                </li>

                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Perfil</a>
                  </div>
                  <div class="pull-right">
                    <a href="../controlador/Usuario.php?op=salir" class="btn btn-default btn-flat">Salir</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>

      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
          <li><a href="escritorio.php"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a></li>

          <li class="treeview">
            <a href="#"><i class="fa fa-list"></i> <span>Asistencia</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href="asistencia.php"><i class="fa fa-circle-o"></i> Asistencias</a></li>
              <li><a href="rptasistencia.php"><i class="fa fa-circle-o"></i> Reportes</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>Empleados</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href="empleado.php"><i class="fa fa-circle-o"></i> Empleados</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-lock"></i> <span>Usuarios</span>
              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
            </a>
            <ul class="treeview-menu">
              <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </aside>

    <div class="content-wrapper">
