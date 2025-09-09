<?php 
	session_start();
	include_once "config/db.php";
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ваш незаменимый помощник</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<header>
		<div class="container">

		</div>
	</header>
	<main>
		<div class="container">
			<div class="card w-50 my-5 mx-auto"> 
				<div class="card-body"> 
					<div class="card-info text-center">
						<img src="assets/img/iconfinder-social-media-work-4341270_120574.svg" alt="main img" class="w-50 text-center main-img">
						<p class="card-text h4"><strong class="text-primary">ToDo</strong> – ваш незаменимый помощник в ежедневной рутине..</p> 
					</div>
					
					
					<form class="my-5 text-center" method="post" action="handlers/auth.php">
						<div class="mb-3">
							<label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
							<input type="email" class="form-control w-75 d-block mx-auto" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Здесь должна быть ваша почта" name="email">
						</div>

						<div class="mb-3">
							<label for="exampleInputPassword1" class="form-label">Пароль</label>
							<input type="password" class="form-control w-75 d-block mx-auto" id="exampleInputPassword1" placeholder="Здесь должен быть ваш пароль" name="password">
						</div>
						
						<div class="row d-flex justify-content-center">
							<?php if(!empty($_SESSION['errors'])) { ?>

							<div class="col-8 alert alert-danger fade show d-flex justify-content-between" role="alert">
							<?php foreach ($_SESSION['errors'] as $errors) {
								echo $errors;
							} ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
							</div>
						<?php unset($_SESSION['errors']) ?>
						<?php }  ?>
						</div>

						<button type="submit" class="btn btn-primary mt-4" name="login">Вход</button>
						<a class="btn mt-4 btn-registration" href="view/registration.php">Регистрация</a>
					</form>
				</div> 
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			
		</div>
	</footer>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>