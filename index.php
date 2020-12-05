<?php
require 'header.php';
require 'app/User.php';

$users = new User();
$users = $users->index(array("id", "name", "birth_date", "cpf", "rg", "phone"));

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0">Usuários</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
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
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<a href="create-user.php" class="btn btn-sm btn-primary"><i class="fa fa-folder-plus"></i> Incluir</a>
						</div> <!-- /.card-header -->
						<div class="card-body">
							<div class="grid-view-overflow-x">
								<table id="tbl_users" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>ID</th>
											<th>Nome</th>
											<th>Data de Nascimento</th>
											<th>CPF</th>
											<th>RG</th>
											<th>Telefone</th>
											<!--<th width="15px">Ações</th>-->
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($users as $users => $user) {
											echo "<tr>";
											foreach ($user as $column => $value) {
												echo "<td>{$value}</td>";
											}
											/*
											echo "<td>
											<a href='' class='btn btn-sm btn-outline-secondary'><i class='fas fa-eye'></i></a>
											<a href='' class='btn btn-sm btn-outline-info'><i class='fas fa-edit'></i></a>
											<button class='btn btn-sm btn-outline-danger' onclick=''><i class='fa fa-trash-alt'></i>
											</button></td>";*/
											echo "</tr>";
										}
										?>
									</tbody>
								</table>
							</div> <!-- /.grid-view-overflow-x -->
						</div> <!-- /.card-body -->
					</div> <!-- /.card -->
				</div> <!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require 'footer.php' ?>