<?php

namespace App\Controllers;

class HomeController
{
	public static function index()
	{
		require_once "../app/Views/home.php";
	}
}