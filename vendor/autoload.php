<?php

function autoloadClasses($className)
{
	$path = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR;
	$file = $path . str_replace("App", "app", str_replace("\\", DIRECTORY_SEPARATOR, $className)) . ".php";

	if (file_exists($file) == false) {
		echo "да!";
		//return false;
	} else {
		echo "нет";
	}

	//require_once $file;
}
autoloadClasses("App\Controllers\LoginController");
spl_autoload_register("autoloadClasses");