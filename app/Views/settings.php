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
									<a class="nav-link active" aria-current="page" href="profile.php">Главная</a>
								</li>
								<li class="nav-item dropdown">
          							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Задачи</a>
          							<ul class="dropdown-menu">
            							<li><a class="dropdown-item" href="task.php">Создать</a></li>
            							<li><a class="dropdown-item" href="tasks.php">Смотреть списком</a></li>
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
	

	<main>
		<div class="container">
			<div class="row">
					<?php 
					if ($user['conf_email'] == 0) {
					?>
				<div class="main col-12 my-5 text-center">	
						<h3>Подтверждение почты</h3>
						<p>Чтобы вы смогли изменять настройки вашего профиля, необходимо подтвердить электронную почту.</p>
						<form action="../handlers/confirm_email.php" method="post">
							<input type="hidden" name="email" value="<?=$user['email'] ?>">
							<input type="submit" class="btn btn-primary mt-3 send-code" value="Отправить код">
						</form>
				</div>
			</div>
					<?php } else { ?>

			<div class="row">
				
			</div>

					<?php } ?>
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
</body>
</html>
<?php } ?>