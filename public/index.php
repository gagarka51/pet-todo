<?php

session_start();
require_once "../app/Core/Config.php";
require_once "../app/Core/Router.php";
require __DIR__ . "/../vendor/autoload.php";

try {
	$router = new Core\\Router();
	$router->dispatch($_SERVER["REQUEST_URI"]);
} catch (\\Throwable $th) {
	echo '<pre>' . print_r($th->getMessage(), true) . '</pre>';
}