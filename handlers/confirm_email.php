<?php 

	session_start();
	
	include_once "../config/db.php";

	$user_id = $_POST['user_id'];
	$user_email = $_POST['email'];

	mail($user_email, 'Подтверждение почты', 'Здрасьте!');
?>