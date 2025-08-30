<?php 

session_start();
include_once "../config/db.php";
//получаем значение переменной из URL $_SERVER['QUERY_STRING']

$id = $_SERVER['QUERY_STRING'];

$del = $db ->query("DELETE FROM `tasks` WHERE `id` = '$id'");
header('Location: ../view/profile.php');

?>