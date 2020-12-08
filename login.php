<?php
require 'app/Session.php';
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>User</b> Management
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Faça o login para iniciar a seção</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" autofocus="" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-secondary btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
          </div>
          <!-- /.col -->
        </form>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/c26e0c0434.js" crossorigin="anonymous"></script>
<!-- Plugins -->
<script src="plugins/jquery-mask-plugin/jquery.mask.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
<!-- Adicional JS -->
<script src="public/js/script.js"></script>
</body>

<?php

if(isset($_POST['email']) && isset($_POST['password'])){
  $session = new Session();
  $success = $session->login($_POST['email'], $_POST['password']);
  if($success){
    echo "<div class='alert alert-success' role='alert'>Login efetuado com sucesso!.</div>";
    header("Location: index.php");
  }
  else
    echo "<div class='alert alert-danger' role='alert'>Usuário ou senha inválidos.</div>";
}
?>

</html>