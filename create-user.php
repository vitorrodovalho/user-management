<?php
require 'header.php';
//require 'functions/check_session.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Cadastrar Usuário</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Cadastrar Usuário</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	<!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
				<div class="card-header">
					<a href="index.php" class="btn btn-sm btn-secondary"><i class="fas fa-backspace"></i> Voltar</a>
				</div> <!-- /.card-header -->
				<div class="card-body">		
					<form role="form" method="POST">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>ID</label>
								<input class="form-control" type="text" name="id" placeholder="<auto>" value="" disabled>
								</div>
								<div class="form-group col-md-5">
									<label>Nome*</label>
									<input class="form-control" type="text" name="name" id="name" placeholder="Nome" value="" required>
								</div>
								<div class="form-group col-md-4">
									<label>Data de Nascimento</label>
									<input class="form-control" type="date" name="birth_date" value="">
								</div>
								<div class="form-group col-md-4">
									<label>CPF*</label>
									<input class="form-control" type="text" name="cpf" placeholder="000.000.000-00" value="" required>
								</div>
								<div class="form-group col-md-4">
									<label>RG*</label>
									<input class="form-control" type="text" name="rg" placeholder="00.000.000-0" value="" required>
								</div>
								<div class="form-group col-md-4">
									<label>Telefone*</label>
									<input class="form-control" type="text" name="phone" placeholder="(00) 0000-0000" value="" required>
								</div>
								<div class="form-group col-md-12">
									<button type="submit" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Salvar</button>
								</div>
							</div> <!-- /.form-row -->
						</form>
					</div>
				</div> <!-- /.card-board -->
			</div> <!-- /.card -->
		</div> <!-- /.container -->
	</div> <!-- /.content -->
</div><!-- /.content-wrapper -->
</div>

<?php require 'footer.php' ?>