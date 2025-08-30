<?php 

session_start();

include_once "../config/db.php";

$user_id = $_SESSION['user_id'];

if (isset($_GET['current_page'])){
   $current_page = $_GET['current_page'];
} else $current_page = 1;

$count_pages = 3;
$current_task = ($current_page * $count_pages) - $count_pages;

$tasks_pagination = $db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id' LIMIT $current_task,$count_pages")->fetch_all(MYSQLI_ASSOC);

$count_tasks = count($db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id'")->fetch_all(MYSQLI_ASSOC));

$count_all_pages = ceil($count_tasks / $count_pages);


/*

Пагинация взята у Tychuk Pavel и переделана под свои нужды

Ссылка на оригинал: https://github.com/Daruse93/notes/blob/master/php/pagination.php

*/


?>