<?php 

	session_start();
	
	include_once "../config/db.php";

	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$date_create = $_POST['date_create'];
	$date_finished = $_POST['date_finished'];

	$_SESSION['success'] = [];

	if ($user_id == "" || $title == "" || $description == "" || $date_finished == "") {
		array_push($_SESSION['errors'], 'Одно из полей не заполнено!');
		header('Location: ../view/edit_task.php');
	} else {
		$new_task = $db ->query("UPDATE `tasks` SET `title` = '$title',`description` = '$description',`date_create` = '$date_create',`date_finished` = '$date_finished' WHERE `user_id` = '$user_id'");
		array_push($_SESSION['success'], 'Задача успешно обновлена!');
        header('Location: ../view/edit_task.php');
	}


?>