<?php 

	session_start();
	
	include_once "../config/db.php";

	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$date_create = $_POST['date_create'];
	$date_finished = $_POST['date_finished'];

	$_SESSION['errors'] = [];
	$_SESSION['success'] = [];

	if ($user_id == "" || $title == "" || $description == "" || $date_finished == "") {
		array_push($_SESSION['errors'], 'Одно из полей не заполнено!');
		header('Location: ../view/task.php');
	} else {
		$new_task = $db ->query("INSERT INTO `tasks` (`user_id`,`title`,`description`,`date_create`,`date_finished`) VALUES ('$user_id','$title','$description','$date_create','$date_finished')");
		array_push($_SESSION['success'], 'Задача успешно добавлена!');
        header('Location: ../view/task.php');
	}
?>