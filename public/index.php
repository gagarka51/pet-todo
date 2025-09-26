<?php

session_start();

require_once __DIR__ . "/../vendor/autoload.php";

use App\Settings\{Config, Router};

try {
	$router = new Router();
	$router->dispatch($_SERVER["REQUEST_URI"]);
} catch (\Throwable $th) {
	echo '<pre>' . print_r($th->getMessage(), true) . '</pre>';
}