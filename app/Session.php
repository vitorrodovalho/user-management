<?php

require_once 'Database.php';

class Session
{
	private $name;
	private $email;

	public function __construct() {
		/*
		$this->name = $name;
		$this->email = $email;
		$this->login();*/
	}

	public function login($email, $password) {
		$db = new Database();
		$user = $db->verify("users", array("name","email", "password"), "email = '{$email}' AND password = '{$password}'");
		if(!empty($user)){
			session_start();
			$_SESSION['name'] = $user[0]["name"];
			$_SESSION['email'] = $user[0]["email"];
			return true;
		}else{
			return false;
		}
	}

	public function verifySession() {
		if (session_status() !== PHP_SESSION_ACTIVE)
			session_start();

		if(isset($_SESSION['name'])==false) {
			header("Location: login.php");
			session_destroy();
		}
	}
}

?>