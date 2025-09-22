<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
	public function login()
	{
		require_once "../app/Views/home.php";
	}

	public function registration()
	{
		require_once "../app/Views/registration.php";
	}
}