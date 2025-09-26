<?php 

namespace App\Settings;

use App\Core\Config;

class Router
{
	private $routes = [];

	public function __construct()
	{
		$this->routes = require_once("routes/web.php");
	}

	public function dispatch(string $url) 
	{
		print($_SERVER["REQUEST_METHOD"]);
		var_dump($url);
		print_r($this->routes);
	}

	public function getRoute($url, $class, $method)
	{
		print($url . "____" . $class . "______" . $method);
	}
}