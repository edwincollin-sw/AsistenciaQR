<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Asistencia QR</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS -->
  <link rel="stylesheet" href="../public/css/bootstrap.min.css">
  <link rel="stylesheet" href="../public/css/font-awesome.css">
  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
  <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
  <link rel="shortcut icon" href="../public/img/favicon.ico">

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../public/datatables/responsive.dataTables.min.css">

  <!-- Bootstrap Select -->
  <link rel="stylesheet" href="../public/css/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- HEADER -->
    <header class="main-header">
      <a href="#" class="logo">
        <span class="logo-mini"><b>C</b>C</span>
        <span class="logo-lg"><b>C</b>ÓDIGOS</span>
      </a>

      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User menu -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../files/usuarios/img/<?php echo $_SESSION['imagen']?> " class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['nombre']?></span>
              </a>

              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="../files/usuarios/img/<?php echo $_SESSION['imagen']?>" class="img-circle" alt="User Image">
                  <p>
                    Asistencia QR
                    <small>2021-2022</small>
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

    <!-- SIDEBAR -->
    <aside class="main-sidebar">
      <section class="sidebar">

        <ul class="sidebar-menu" data-widget="tree">

          <!-- Escritorio -->
          <li>
            <a href="#"><i class="fa fa-dashboard"></i> <span>Escritorio</span></a>
          </li>

          <!-- Asistencia -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>Asistencia</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="asistencia.php"><i class="fa fa-circle-o"></i> Asistencias</a></li>
              <li><a href="rptasistencia.php"><i class="fa fa-circle-o"></i> Reportes</a></li>
            </ul>
          </li>

          <!-- Empleados -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Empleados</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="empleado.php"><i class="fa fa-circle-o"></i> Empleados</a></li>
            </ul>
          </li>

          <!-- Usuarios -->
          <li class="treeview">
            <a href="#">
              <i class="fa fa-lock"></i> <span>Usuarios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="usuario.php"><i class="fa fa-circle-o"></i> Usuarios</a></li>
            </ul>
          </li>

        </ul>

      </section>
    </aside>

  </div>

</body>

</html>
