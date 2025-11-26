<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Asistencias QR</title>

  <link rel="stylesheet" href="../public/css/bootstrap.min.css">

  <!-- Font Awesome desde CDN (quitas el error 404) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../public/css/_all-skins.min.css">
</head>

<body class="hold-transition login-page">

  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Asistencias </b>QR</a>
    </div>

    <div class="login-box-body">
      <p class="login-box-msg">Ingresa tus datos</p>

      <form id="frmAcceso" method="post">
        <div class="form-group has-feedback">
          <input type="text" id="logina" name="logina" class="form-control" placeholder="Usuario">
          <span class="fa fa-user form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
          <input type="password" id="clavea" name="clavea" class="form-control" placeholder="Contraseña">
          <span class="fa fa-key form-control-feedback"></span>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
      </form>

    </div>
  </div>

  <script src="../public/js/jquery-3.1.1.min.js"></script>
  <script src="../public/js/bootstrap.min.js"></script>
  <script src="../public/js/bootbox.min.js"></script>
  <script src="scripts/login.js"></script>

</body>
</html>
