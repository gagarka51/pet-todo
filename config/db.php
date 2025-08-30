<?php 

$db = mysqli_connect("localhost", "root", "");

mysqli_query($db, "SET NAMES 'utf8'") or die("Не удалось установить кодировочку!");
mysqli_select_db($db, "todo");

if (!$db) {
    echo "Проблема с подключением базы данных...";
    die;
} 


?>
