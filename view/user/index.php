<?php
require 'menu.php';
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
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<a href="editar_usuario.php" class="btn btn-sm btn-info"><i class="fa fa-folder-plus"></i> Incluir</a>
						</div> <!-- /.card-header -->
						<div class="card-body">
							<div class="grid-view-overflow-x">
								<table id="tbl_usuarios" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Nome</th>
											<th>Data de Nascimento</th>
											<th>CPF</th>
											<th>RG</th>
											<th>Telefone</th>
											<th width="15px">Ações</th>
										</tr>
									</thead>
									<tbody>
										<?php
										

										if ($sql->rowCount() > 0){
											foreach ($sql->fetchall() as $user){
												echo '<tr>';
												echo '<td>'.$user['id'].'</td>';
												echo '<td>'.$user['cnpj'].'</td>';
												echo '<td>'.$user['email_acesso'].'</td>';
												echo '<td>'.$user['contato'].'</td>';
												if($user['status']=='1'){
													echo "<td><span class='badge badge-success'>Ativo</span></td>";
												}else {
													echo "<td><span class='badge badge-danger'>Inativo</span></td>";
												}											
												echo '<td><a href="editar_usuario.php?id='.$user['id'].'&acao=edit"><i class="btn btn-info btn-sm fa fa-edit"></i></i></td>';
												echo '<td><a href="editar_usuario.php?id='.$user['id'].'&acao=delete" onClick="return confirm(\'Confirmar exclusão de usuário\')"><i class="btn btn-danger btn-sm fa fa-trash-alt"></i></td>';
												echo '</tr>';	
											}
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