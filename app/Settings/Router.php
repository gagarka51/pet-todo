<?php 

namespace App\Settings;

use App\Core\Config;

class Router
{
	private $routes = [];

	public function dispatch(string $url) 
	{
		print($_SERVER["REQUEST_METHOD"]);
		var_dump($url);
	}
}