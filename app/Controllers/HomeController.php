<?php

namespace App\Controllers;

class HomeController
{
	public function index()
	{
		return header("Location: ../Views/registration.php");
	}
}