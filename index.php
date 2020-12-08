<?php
require 'verify_session.php';
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
							<a href="user-form.php?action=create" class="btn btn-sm btn-primary"><i class="fa fa-folder-plus"></i> Incluir</a>
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
											<th>Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($users as $users => $user) {
											echo "<tr>";
											foreach ($user as $column => $value) {
												echo "<td>{$value}</td>";
											}
											echo "<td>
											<a href='user-form.php?user_id={$user['id']}&action=view' class='btn btn-sm btn-outline-secondary'><i class='fas fa-eye'></i></a>
											<a href='user-form.php?user_id={$user['id']}&action=edit' class='btn btn-sm btn-outline-info'><i class='fas fa-edit'></i></a>
											<a href='delete-user.php?user_id={$user['id']}' class='btn btn-sm btn-outline-danger' onClick='return confirm(\"Confirmar exclusão de usuário\")'><i class='fa fa-trash-alt'></a></td>";
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

<?php 

require 'footer.php';

if(isset($_GET['message'])):
	$message = addslashes($_GET['message']);
	if ($message == "create"): ?>
		<script>$( "<div class='alert alert-success' role='alert'>Usuário criado com sucesso.</div>" ).insertBefore( ".card" );</script>
	<?php elseif($message == "edit"): ?>
		<script>$( "<div class='alert alert-success' role='alert'>Usuário atualizado com sucesso.</div>" ).insertBefore( ".card" );</script>
	<?php elseif($message == "delete"): ?>
		<script>$( "<div class='alert alert-success' role='alert'>Usuário excluído com sucesso.</div>" ).insertBefore( ".card" );</script>
	<?php endif; ?>
	<script>window.history.pushState({}, document.title, "/user-management/" + "index.php");</script>
<?php endif;

?>