<?php 

session_start();
include_once "../config/db.php";

$name = $_POST['name'];
$date = $_POST['date'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$_SESSION['errors'] = [];

$user = $db->query("SELECT * FROM `users` WHERE `email` ='$email'")->fetch_assoc();

if (!($name == '' || $date == '' || $email == '' || $password == '' || $confirm == '')) {
	if ($user['email'] == $email) {
		array_push($_SESSION['errors'], 'Пользователь с такой электронной почтой уже зарегистрирован!');
		header('Location: ../view/registration.php');
	} else {
		if ($password == $confirm) {
			$pass = md5(md5($password));
        	$new_user = $db ->query("INSERT INTO `users` (`name`,`date`,`email`,`password`) VALUES ('$name','$date','$email','$pass')");
        	header('Location: ../handlers/auth.php');
		} else {
			array_push($_SESSION['errors'], 'Введенные пароли не совпадают!');
			header('Location: ../view/registration.php');
		}
	}
} else {
	array_push($_SESSION['errors'], 'Одно из полей не заполнено!');
	header('Location: ../view/registration.php');
}

?>