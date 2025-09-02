<?php

function _autoload($className)
{
	$file = $className . ".php";
	
	if (file_exists($file) == false) {
		return false;
	}

	include($file);
}