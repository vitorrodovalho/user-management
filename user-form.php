<?php
require 'verify_session.php';
require 'header.php';
require 'app/User.php';
require 'app/Address.php';

if(isset($_GET['action']))
	$action = addslashes($_GET['action']);

if(isset($_GET['user_id'])){
	$user_id = addslashes($_GET['user_id']);
	$user = new User();
	$user = $user->show($user_id);

	$address = new Address();
	$address = $address->show($user_id);
}

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
							<form role="form" method="POST" id="form" class="form">
								<div class="form-row">
									<div class="form-group col-md-3">
										<label>Nome</label>
										<input class="form-control" type="text" maxlength="200" name="name" id="name" placeholder="Nome" value="<?php if(isset($user_id)): echo $user[0]['name']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>Email</label>
										<input class="form-control" type="email" maxlength="300" name="email" id="email" placeholder="Email" value="<?php if(isset($user_id)): echo $user[0]['email']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>Senha</label>
										<input class="form-control" type="password" maxlength="20" name="password" id="password" placeholder="Senha" value="<?php if(isset($user_id)): echo $user[0]['password']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>Data de Nascimento</label>
										<input class="form-control" type="date" name="birth_date" value="<?php if(isset($user_id)): echo $user[0]['birth_date']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>CPF</label>
										<input class="form-control cpf" type="text" maxlength="20" name="cpf" placeholder="000.000.000-00" value="<?php if(isset($user_id)): echo $user[0]['cpf']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>RG</label>
										<input class="form-control rg" type="text" maxlength="20" name="rg" placeholder="00.000.000-0" value="<?php if(isset($user_id)): echo $user[0]['rg']; endif;?>" required>
									</div>
									<div class="form-group col-md-3">
										<label>Telefone</label>
										<input class="form-control phone" type="text" maxlength="30" name="phone" placeholder="(00) 00000-0000" value="<?php if(isset($user_id)): echo $user[0]['phone']; endif;?>" required>
									</div>
									<div class="col-12 my-2">
										<span>ENDEREÇO</span>
										<hr>
									</div>
								</div>
								<div id="address">
									<div class="form-row">
										<div class="form-group col-md-1">
											<input class="form-control cep" type="text" maxlength="13" id="postal_code" name="postal_code[]" value="" placeholder="CEP" required>
										</div>
										<div class="form-group col-md-1">
											<input class="form-control" type="text" maxlength="300" id="state" name="state[]" value="" placeholder="Estado" required>
										</div>
										<div class="form-group col-md-2">
											<input class="form-control" type="text" maxlength="300" id="city" name="city[]" value="" placeholder="Cidade" required>
										</div>
										<div class="form-group col-md-3">
											<input class="form-control" type="text" maxlength="300" id="street" name="street[]" value="" placeholder="Rua" required>
										</div>
										<div class="form-group col-md-2">
											<input class="form-control" type="text" maxlength="200" id="neighborhood" name="neighborhood[]" value="" placeholder="Bairro" required>
										</div>
										<div class="form-group col-md-1">
											<input class="form-control" type="text" maxlength="11" id="number" name="number[]" value="" placeholder="Número" required>
										</div>
										<div class="form-group col-md-2">
											<?php if ($action != "view"): ?>
												<a class="btn btn-sm btn-secondary text-white" onclick="duplicateAddress();"><i class="fas fa-plus"></i></a>
												<a class="removeAddress btn btn-sm btn-secondary text-white"><i class="fas fa-minus"></i></a>
											<?php endif ?>
										</div>
									</div>
								</div>
								<div id="destiny-address"></div>
								<?php if ($action != "view"): ?>
									<div class="form-row">
										<div class="form-group col-md-12">
											<button type="submit" type="button" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Salvar</button>
										</div>
									</div>
								<?php endif ?>
							</div>
						</form>
					</div>
				</div> <!-- /.card-board -->
			</div> <!-- /.card -->
		</div> <!-- /.container -->
	</div> <!-- /.content -->
</div><!-- /.content-wrapper -->

<?php 

require 'footer.php';

//CREATE
if(!empty($_POST) && $action == "create"){
	$user = new User();
	$user_id = $user->create($_POST['name'], $_POST['email'], $_POST['password'], $_POST['birth_date'], $_POST['cpf'], $_POST['rg'], $_POST['phone']);

	for($i = 0; $i < sizeof($_POST['postal_code']); $i++){
		$address = new Address();
		$address_id = $address->create($user_id, $_POST['postal_code'][$i], $_POST['state'][$i], $_POST['city'][$i], $_POST['street'][$i], $_POST['neighborhood'][$i], $_POST['number'][$i]);
	}

	if($user_id && $address_id): ?>
		<script>$(location).attr('href', '/user-management/index.php?message=create')</script> 
	<?php else : ?>
		<script>$( "<div class='alert alert-danger' role='alert'>Erro ao criar usuário.</div>" ).insertBefore( ".form" );</script>
	<?php endif;
} 

//EDIT
if(!empty($_POST) && $action == "edit"){
	$user = new User();
	$success = $user->update($user_id, $_POST['name'], $_POST['email'], $_POST['password'], $_POST['birth_date'], $_POST['cpf'], $_POST['rg'], $_POST['phone']);

	$address = new Address();
	$address->delete($user_id);

	for($i = 0; $i < sizeof($_POST['postal_code']); $i++){
		$address = new Address();
		$address_id = $address->create($user_id, $_POST['postal_code'][$i], $_POST['state'][$i], $_POST['city'][$i], $_POST['street'][$i], $_POST['neighborhood'][$i], $_POST['number'][$i]);
	}

	if($success && $address_id): ?> 
		<script>$(location).attr('href', '/user-management/index.php?message=edit')</script> 
	<?php else: ?>
		<script>$( "<div class='alert alert-danger' role='alert'>Erro ao atualizar usuário.</div>" ).insertBefore( ".form" );</script>
	<?php endif;
}

?>

<script type="text/javascript">
	function duplicateAddress(){
		var clone = document.getElementById('address').cloneNode(true);
		var destiny = document.getElementById('destiny-address');
		destiny.appendChild (clone);
		var camposClonados = clone.getElementsByTagName('input');
		for(i=0; i<camposClonados.length;i++){
			camposClonados[i].value = '';
		}
	}

	function addAddress(){
		var clone = document.getElementById('address').cloneNode(true);
		var destiny = document.getElementById('destiny-address');
		destiny.appendChild (clone);
	}

    $('body').on("click", ".removeAddress", function(e) {
    	if($('.removeAddress').length > 1){
	        e.preventDefault();
	        $(this).parent().parent().parent().remove();
    	}
    })


	$('.postal_code').mask('00000000');
	$('.phone').mask('(00) 00000-0000');
	$('.cpf').mask('000.000.000-00', {reverse: true});
	$('.rg').mask('00.000.000-0', {reverse: true});

	<?php if ($action != "create"): ?>

		var address = <?php echo json_encode($address); ?>;
		$.each( address, function( key, value ) {
			$('#postal_code').val(value["postal_code"]);
			$('#state').val(value["state"]);
			$('#city').val(value["city"]);
			$('#street').val(value["street"]);
			$('#neighborhood').val(value["neighborhood"]);
			$('#number').val(value["number"]);
			if(key != address.length-1)
				addAddress();
		});

	<?php endif ?>

	<?php if ($action == "view"): ?>

		$('input').each(function(){
			$(this).prop("disabled", true);
		});

	<?php endif ?>
</script>