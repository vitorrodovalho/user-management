<?php
require 'menu.php';
?>

<div class="content-wrapper">
	<div class="content-header">
		<div class="container">
			<div class="row my-3">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Downloads</h1>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div><!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container">	
			<div class="row">
				<div class="col-12">
					<?php if($_SESSION['id'] == '9999') {?>
						<div class="card">
							<div class="card-header">
								<a href="editar_downloads.php" class="btn btn-sm btn-info"><i class="fa fa-folder-plus"></i> Incluir</a>
							</div>
						</div>
					<?php } ?>
					<?php
					$sql = "SELECT c.id, c.nome, c.descricao, COUNT(d.id) FROM categoria AS c INNER JOIN download d ON d.id_categoria = c.id";
					if($_SESSION['id'] <> '9999')
						$sql .= " INNER JOIN acesso_download a ON d.id_categoria = a.id_categoria WHERE a.id_user = ".$_SESSION['id']." AND d.status = '1' AND c.status = '1'";
					$sql .= " GROUP BY c.id ORDER BY c.nome;";
					$sql = $pdo->query($sql);
					foreach ($sql->fetchall() as $categoria){
						?>
						<div class="card">
							<div class="card-header">
								<span style="font-size: 17px"><b><?= $categoria['nome'] ?></b> 
									<?php if($categoria['descricao'] <> "")
									echo ":" . $categoria['descricao'] ?>
								</span>
							</div> <!-- /.card-header -->
							<div class="card-body">
								<div class="grid-view-overflow-x">
									<table id="tbl_downloads" class="table table-bordered table-striped hover">
										<thead>
											<tr>
												<th></th>
												<th>Nome</th>
												<th>Descrição</th>
												<th>Versão</th>
												<th>Data Inc.</th>
												<th>Download</th>
												<?php if($_SESSION['id'] == '9999'){
													echo "<th>Status</th>";
													echo "<th width='15px'></th>";
													echo "<th width='15px'></th>";
												}?>
											</tr>
										</thead>
										<tbody>
											<?php
											$sql = "SELECT d.`id`,d.`nome`,d.`descricao`,d.`versao`,d.`data_inclusao`,d.`downloads`,d.`file`,d.`link`,d.`status` FROM download as d INNER JOIN (SELECT nome, MAX(versao) MaxVersion FROM download GROUP BY nome) maxrow ON d.versao = maxrow.MaxVersion AND d.nome = maxrow.nome";
											$sql .= " WHERE d.id_categoria = " . $categoria['id'];
											if($_SESSION['id'] <> '9999')
												$sql .= " AND d.status = 1";
											$sql = $pdo->query($sql);
											if ($sql->rowCount() > 0){
												foreach ($sql->fetchall() as $download){
													echo '<tr>';
													if (strpos($download['nome'], 'SDK') !== false)
														echo "<td><i class='fas fa-laptop-code icon-download'></i></td>";
													else if (strpos($download['nome'], 'Manual') !== false)
														echo "<td><i class='fas fa-book icon-download'></i></td>";
													else if (strpos($download['nome'], 'Ficha Técnica') !== false)
														echo "<td><i class='fas fa-clipboard-list icon-download'></i></td>";
													else
														echo "<td><i class='fas fa-file-download icon-download'></i></td>";

													echo '<td>'.$download['nome'].'</td>';
													echo '<td>'.$download['descricao'].'</td>';
													echo '<td>'.$download['versao'].'</td>';
													echo '<td>'.date("d/m/Y", strtotime($download['data_inclusao'])).'</td>';
													
													if($download['link'])
														echo '<td><a href="'.$download['link'].'" target="_blank"><i class="btn btn-info btn-sm fas fa-globe"> <span style="font-weight: 400;">Acessar</span></i></a></td>';
													else
														echo '<td><a href="functions/download.php?arquivo='.$download['file'].'&id='.$download['id'].'"><i class="btn btn-info btn-sm fas fa-download"> <span style="font-weight: 400;">Download</span></i></a></td>';
													
													if($_SESSION['id'] == '9999'){
														if($download['status']=='1'){
															echo "<td><span class='badge badge-success'>Ativo</span></td>";
														}else {
															echo "<td><span class='badge badge-danger'>Inativo</span></td>";
														}
														echo '<td><a href="editar_downloads.php?id='.$download['id'].'&acao=edit"><i class="btn btn-info btn-sm fa fa-edit"></i></a></td>';
														echo '<td><a href="editar_downloads.php?id='.$download['id'].'&acao=delete" onClick="return confirm(\'Confirmar exclusão de download\')"><i class="btn btn-danger btn-sm fa fa-trash-alt"></i></a></td>';
													}
													echo '</tr>';	
												}
											}
											?>	
										</tbody>
									</table>
								</div> <!-- /.grid-view-overflow-x -->
							</div> <!-- /.card-body -->
						</div> <!-- /.card -->
					<?php } ?>
					<p class="text-center my-4"><a href="downloads.php">Download Versões Anteriores</a></p>
				</div> <!-- /.col-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php require 'footer.php' ?>