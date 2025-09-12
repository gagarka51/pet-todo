<?php 

include_once "../config/db.php";
include_once "../handlers/pagination.php";
	
$user_id = $_SESSION['user_id'];
$user = $db->query("SELECT * FROM `users` WHERE `id` ='$user_id'")->fetch_assoc();
$tasks = $db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id'")->fetch_all(MYSQLI_ASSOC);

?>
<div class="sidebar container">
		<div class="row">
			<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
					<div class="offcanvas-header">
						<img src="../assets/img/6zb-ZhS16k4.jpg" class="rounded-circle avatar w-25" alt="Avatar"/>
						<h5 class="offcanvas-title" id="offcanvasExampleLabel">
							<?=$user['name']; ?>	
						</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
				</div>

				<div class="offcanvas-body">
					<div class="alert alert-info" role="alert">
						В вашем списке <?=count($tasks); ?> задач(а/и)
					</div>
				<nav>
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="tasks.php">Мои задачи</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="calendar.php">Мой календарь</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="analyse.php">Анализ деятельности</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="settings.php">Настройки</a>
						</li>
					</ul>
				</nav>
					<?php 
						if ($user['date'] == date("Y-m-d")) {
					?>
				<button type="button" class="btn btn-primary mt-5" id="liveToastBtn">Поздравление!</button>
					<?php 
						}
					?>
				</div>
		</div>		
	</div>