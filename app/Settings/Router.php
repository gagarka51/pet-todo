<?php 

namespace App\Settings;

use App\Settings\Config;

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
			foreach ($this->routes as $stUri => $clFunc) {
				$classFunc = self::separateClassFunc($clFunc);
				if ($uri == $stUri) {
					call_user_func([$classFunc[0], $classFunc[1]]);
				}
			}
		} else {
			require_once("../Views/404.php");
		}
	}

	private function separateClassFunc($clFunc) :array
	{
		$class = explode("@", $clFunc);
		$classFunc[] = Config::DEFAULT_NAMESPACE_CONTROLLERS . $class[0];
		$classFunc[] = $class[1];

		return $classFunc;
	}
}