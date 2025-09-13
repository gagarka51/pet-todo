<?php

require_once "../config/config.php";
require __DIR__ . "/../vendor/autoload.php";

$request = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$controllerName = isset($request[0]) ? ucfirst($request[0]) . 'Controller' : 'HomeController';
$actionMethod = isset($request[1]) ? strtolower($request[1]) : 'index';

$controllerFilePath = CONTROLLER_PATH . $controllerName . '.php';
if (file_exists($controllerFilePath)) {
	include_once $controllerFilePath;
	$controllerInstance = new $controllerName();
	call_user_func([$controllerInstance, $actionMethod]);
} else {
	header("HTTP/1.0 404 Not Found");
	die("Ошибка 404: Контроллер не найден.");
}