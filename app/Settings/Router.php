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

	public function dispatch(string $uri) 
	{
		if ($uri !== "") {
			
		} else {
			require_once("../Views/404.php");
		}
	}
}