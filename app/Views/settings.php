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
<?php } ?>