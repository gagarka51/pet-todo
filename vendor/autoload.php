<?php

function _autoload($className)
{
	$fileName = strtolower($className) . ".php";

	//$file =;
	
	if (file_exists($file) == false) {
		return false;
	}

	include($file);
}