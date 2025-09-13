<?php

namespace App\Core;

class Config 
{
	const BASE_URL = "/";
	const DEFAULT_CONTROLLER = "HomeController";
    const DEFAULT_ACTION = "index";
    //const DEBUG_MODE = true;

    /*public static function setDebugMode(bool $debug) {
        ini_set('display_errors', $debug ? 'On' : 'Off');
        error_reporting($debug ? E_ALL : 0);
    }*/
}