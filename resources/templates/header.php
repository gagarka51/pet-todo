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