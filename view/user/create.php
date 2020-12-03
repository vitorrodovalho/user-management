<?php
//require 'menu.php';
//require 'functions/check_session.php';
?>
<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Usuários</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div><!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<a href="usuario.php" class="btn btn-sm btn-secondary"><i class="fas fa-backspace"></i> Voltar</a>
				</div> <!-- /.card-header -->
				<div class="card-body">		
					<form role="form" method="POST">
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>ID</label>
								<input class="form-control form-control-sm" type="text" name="id" placeholder="<auto>" value="<?php echo $dado['id']?>" disabled>
								</div>
								<div class="form-group col-md-4">
									<label>Nome*</label>
									<input class="form-control form-control-sm" type="text" name="name" id="name" placeholder="Nome" value="<?php echo $dado['name']?>" required>
								</div>
								<div class="form-group col-md-5">
									<label>Data de Nascimento</label>
									<input class="form-control form-control-sm" type="date" name="birth_date" value="<?php echo $dado['birth_date']?>">
								</div>
								<div class="form-group col-md-4">
									<label>CPF*</label>
									<input class="form-control form-control-sm" type="text" name="nome" placeholder="Nome" value="<?php echo $dado['nome']?>" required>
								</div>
								<div class="form-group col-md-12">
									<button type="submit" type="button" class="btn btn-sm btn-info"><i class="fas fa-save"></i> Salvar</button>
								</div>
							</div> <!-- /.form-row -->
						</form>
					</div>
				</div> <!-- /.card-board -->
			</div> <!-- /.card -->
		</div> <!-- /.container -->
	</div> <!-- /.content -->
</div><!-- /.content-wrapper -->
<?php
//require '.../sections/footer.php' ?>