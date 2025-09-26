<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
	public static function login()
	{
		require_once "../app/Views/home.php";
	}

	public static function registration()
	{
		require_once "../app/Views/registration.php";
	}
}