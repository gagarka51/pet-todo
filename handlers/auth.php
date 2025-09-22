<?php 


$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['errors'] = [];

$user = $db->query("SELECT * FROM `users` WHERE `email` ='$email'")->fetch_assoc();


if ($email == '' || $password == '') {
	array_push($_SESSION['errors'], 'Одно из полей не заполнено!');
	header('Location: ../index.php');
} else {
	if (!empty($user)) {
		if ($email == $user['email']) {
			if (md5(md5($password)) == $user['password']) {
				$_SESSION['user_id'] = $user['id'];
				$_SESSION['auth'] = "ok";
				header('Location: ../view/profile.php');
			} else {
				array_push($_SESSION['errors'], 'Пароль введён неверно. Повторите попытку');
			header('Location: ../index.php');
			}
		} 
	} else {
			array_push($_SESSION['errors'], 'Такого пользователя нет. Попробуйте ввести другие данные');
			header('Location: ../index.php');
	}
}

?>