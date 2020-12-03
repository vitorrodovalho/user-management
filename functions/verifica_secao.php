<?php
session_start();
if(isset($_SESSION['id'])==false) {
	header("Location: login.php");
	session_destroy();
}
?>