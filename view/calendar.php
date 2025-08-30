<?php 
	session_start();
	if (empty($_SESSION['auth'])) {
		header('Location: ../index.php');
	} else{
	
	include_once "../config/db.php";
	$user_id = $_SESSION['user_id'];
	$user = $db->query("SELECT * FROM `users` WHERE `id` ='$user_id'")->fetch_assoc();
	$tasks = $db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id'")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Твой незаменимый помощник</title>
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-expand-lg bg-body-tertiary">
					<div class="container-fluid d-flex align-items-end">

						<a class="navbar-brand" href="profile.php"><strong class="text-primary h1">ToDo</strong></a>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link" aria-current="page" href="profile.php">Главная</a>
								</li>
								<li class="nav-item dropdown">
          							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Задачи</a>
          							<ul class="dropdown-menu">
            							<li><a class="dropdown-item" href="task.php">Создать</a></li>
            							<li><a class="dropdown-item active" href="tasks.php">Смотреть списком</a></li>
          							</ul>
        						</li>
								<li class="nav-item">
									<a class="nav-link" href="../handlers/logout.php">Выйти</a>
								</li>
							</ul>
						</div>

						<div class="btn-offcanvas">
							<button class="btn border-primary mt-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
								<span class="navbar-toggler-icon"></span>
							</button>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</header>
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

	<main>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<table id="calendar3" class="table">
  						<thead>
    						<tr>
    							<td colspan="4">
    								<select class="form-select">
										<option value="0">Январь</option>
										<option value="1">Февраль</option>
										<option value="2">Март</option>
										<option value="3">Апрель</option>
										<option value="4">Май</option>
										<option value="5">Июнь</option>
										<option value="6">Июль</option>
										<option value="7">Август</option>
										<option value="8">Сентябрь</option>
										<option value="9">Октябрь</option>
										<option value="10">Ноябрь</option>
										<option value="11">Декабрь</option>
									</select>
								</td>
								<td colspan="3">
									<input type="number" value="" min="0" max="9999" size="4" class="form-control">
								</td>
							</tr>
							<tr>
								<td>Пн</td><td>Вт</td><td>Ср</td><td>Чт</td><td>Пт</td><td class="holiday">Сб</td><td class="holiday">Вс</td>
							</tr>
						</thead>
						<tbody></tbody>
				</table>
				</div>	
			</div>
			<div class="row">
				<div class="col-6">
					 Здесь будут задачи на этот месяц
				</div>
			</div>
		</div>
	</main>
<footer>
		<div class="container">
			<div class="toast-container position-fixed bottom-0 end-0 p-3">
				<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
					<div class="toast-header d-flex justify-content-between">
						<strong class="text-primary">ToDo</strong>
						<small><?=date("Y-m-d") ?></small>
						<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
					</div>
					<div class="toast-body">
						<p>
							От всей души поздравляем вас с днём рождения! Желаем вам всего самого наилучшего.
						</p>
						<p>С уважением команда ToDo!</p>
					</div>
				</div>
			</div>

		</div>
	</footer>
	<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrapcast.js"></script>
	<script type="text/javascript" src="../assets/js/calendar.js"></script>
</body>
</html>
<?php } ?>