<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Config;
use App\Core\Router;
use App\Controllers\HomeController;

$controller = new HomeController();
$controller->index();

/*$router = new Router();
$router->dispatch($_SERVER["REQUEST_URI"]);*/

/*try {
	$router = new Router();
	$router->dispatch($_SERVER["REQUEST_URI"]);
} catch (\Throwable $th) {
	echo '<pre>' . print_r($th->getMessage(), true) . '</pre>';
}*/