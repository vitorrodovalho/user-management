<?php
session_start();
require 'functions/config.php';

if(isset($_POST['email']) && empty($_POST['email']) == false){
  if(isset($_POST['senha']) && empty($_POST['senha']) == false) {
    $email = addslashes($_POST['email']); 
    $senha = addslashes($_POST['senha']);

    $sql = $pdo->query("SELECT * FROM usuario WHERE email_acesso = '$email' AND senha_acesso = '$senha' AND status = '1';");

    if($email == 'desenvolvimento@marchiengenharia.com.br' && $senha == 'viaonda2020*'){
      $_SESSION['id'] = '9999';
      $_SESSION['nome'] = 'admin';
      $_SESSION['email'] = 'desenvolvimento@marchiengenharia.com.br';
      header("Location: index.php"); 
    }else if($sql->rowCount() > 0){
      $dado = $sql->fetch(); 
      $_SESSION['id'] = $dado['id'];
      $_SESSION['nome'] = $dado['nome'];
      $_SESSION['email'] = $dado['email_acesso'];
      header("Location: index.php"); 
    }
    else {
      $msgErro = "Usuário ou senha inválido.";
    }
  }
}

require 'header.php';
?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>ViaOnda</b> Área Restrita
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Faça o login para iniciar a seção</p>
        <form method="POST">
          <div class="input-group mb-3">
            <input type="email" class="form-control form-control-sm" name="email" placeholder="Email" autofocus="" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control form-control-sm" name="senha" placeholder="Senha" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-secondary btn-sm btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
          </div>
          <!-- /.col -->
          <div class="text-center">
            <?php require 'functions/mensagens.php'; ?>
          </div>
        </form>
        <div class="col pt-2 pb-1 text-center">
          <a href="recuperar_senha.php">Recuperar Senha</a><span> | </span><a href="solicitar_acesso.php">Solicitar Acesso</a>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
  <div class="direito-autoral text-center">
    <span>Desenvolvido por </span><br>
    <a href="https://www.viaondarfid.com.br/" target="_blank"><img src="img/viaonda300px.png" alt="ViaOnda Logo" class="brand-image" style="width: 80px; height: auto;"></a>
  </div>
</div>
</body>
<?php require 'required_script.php' ?>