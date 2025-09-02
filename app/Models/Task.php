<?php

namespace App\Models;

class Task
{
	public $title;
	public $description;
	private $user_id;
	private $date_create;
	private $date_finished;
	protected $table = "tasks";

	/*public function getTasks($user_id)
	{

	}*/
}