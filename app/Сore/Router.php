<?php 

namespace App\Core;

use App\Core\Config;

class Router
{
	public function dispatch(string $uri) 
	{
		list($controllerName, $method) = explode("/", ltrim($uri, "/"));

		$controllerClass = empty($controllerName) ? Config::DEFAULT_CONTROLLER : ucfirst($controllerName) . "Controller";
		$method = empty($method) ? Config::DEFAULT_ACTION : $method;

		if (!file_exists("../app/controllers/" . $controllerClass . ".php")) {
			throw new Exception("Контроллер {$controllerClass} не найден!");
		}

		require_once "../app/controllers/" . $controllerClass . ".php";
		$controller = new $controllerClass();
		$controller->$method();
	}
}