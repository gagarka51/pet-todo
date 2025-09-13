<?php

session_start();

use Core\Config;
use Core\Router;
//require_once "../app/Core/Config.php";
//require_once "../app/Core/Router.php";
require __DIR__ . "/../vendor/autoload.php";

try {
	$router = new Router();
	$router->dispatch($_SERVER["REQUEST_URI"]);
} catch (\Throwable $th) {
	echo '<pre>' . print_r($th->getMessage(), true) . '</pre>';
}