<?php

spl_autoload_register(function ($className)
{
	$path = dirname(__FILE__);
	$file = $path . DIRECTORY_SEPARATOR . str_replace("\\", DIRECTORY_SEPARATOR, $className) . ".php";

	if (file_exists($file) == false) {
		return false;
	}

	require_once $file;
});