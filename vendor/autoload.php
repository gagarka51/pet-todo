<?php

function autoloadClasses($className)
{
	$path = __DIR__ . "../";
	$file = $path . $className . ".php";
	
	if (file_exists($file) == false) {
		return false;
	}

	require_once $file;
}

spl_autoload_register("autoloadClasses");