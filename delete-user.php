<?php
require 'verify_session.php';
require 'app/User.php';
require 'app/Address.php';

if(isset($_GET['user_id'])){
	$user_id = addslashes($_GET['user_id']);

	$address = new Address();
	$address = $address->delete($user_id);

	$user = new User();
	$user = $user->delete($user_id);

	header("Location: index.php?message=delete");
}

?>