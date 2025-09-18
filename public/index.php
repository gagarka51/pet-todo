<?php

session_start();

require __DIR__ . "/../vendor/autoload.php";
use App\Core\Config;
use App\Core\Router;

try {
	$router = new Router();
	$router->dispatch($_SERVER["REQUEST_URI"]);
} catch (\Throwable $th) {
	echo '<pre>' . print_r($th->getMessage(), true) . '</pre>';
}