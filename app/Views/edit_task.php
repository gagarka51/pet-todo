<?php 

	session_start();
	if (empty($_SESSION['auth'])) {
		header('Location: ../index.php');
	} else{
	
	include_once "../config/db.php";
	$user_id = $_SESSION['user_id'];
	$user = $db->query("SELECT * FROM `users` WHERE `id` ='$user_id'")->fetch_assoc();
	$tasks = $db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id'")->fetch_all(MYSQLI_ASSOC);
	$task_id = $_SERVER['QUERY_STRING'];
	$task = $db->query("SELECT * FROM `tasks` WHERE `id` ='$task_id'")->fetch_assoc();
?>
	<main>
		<div class="container">
			<div class="row">
				<div class="col-12 text-center my-4">
					<h2>Редактирование задачи</h2>
				</div>
			</div>
			<div class="row">
					<?php if(!empty($_SESSION['success'])) { ?>

						<div class="col-6 alert alert-success fade show d-flex justify-content-between" role="alert">
							<?php foreach ($_SESSION['success'] as $success) {
								echo $success;
							} ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
						</div>
						<?php unset($_SESSION['success']) ?>
						<?php }  ?>
			</div>
			<div class="row">
				<div class="main mt-3 text-center">
					<form method="post" action="../handlers/update_task.php">
						<div class="row">
							<div class="col-md-4 d-none">
    							<input type="hidden" class="form-control" id="input" value="<?=$user['id']; ?>" name="user_id">
  							</div>

  							<div class="col-md-4">
    							<label for="inputName" class="form-label" title="Выбирайте название короткое и понятное">Название</label>
    							<input type="text" class="form-control" id="inputName" name="title" value="<?=$task['title']; ?>">
  							</div>

  							<div class="col-md-2">
  							  	<label for="inputDate" class="form-label">Дата напоминания</label>
  							  	<input type="date" class="form-control" name="date_finished" value="YYYY-MM-DD">
  							</div>

						</div>

						<div class="row mt-3">
							<div class="col-md-6">
  								<label for="exampleFormControlTextarea1" class="form-label">Описание</label>
  								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Старое описание: <?=$task['description']; ?>"></textarea>
							</div>
							<div class="col-md-6">
								<img class="w-25" src="../assets/img/iconfinder-free-time-4341276_120579.svg" alt="иллюстрация мальчика с карандашом">
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<p class="text-info">Нынешняя дата напоминания: <?=$task['date_finished']; ?></p>
							</div>
						</div>

  						<div class="col-md-4 d-none">
    						<input type="hidden" class="form-control" id="input" name="date_create" value="<?=date('Y-m-d'); ?>">
  						</div>
						

  						<?php if(!empty($_SESSION['errors'])) { ?>

						<div class="col-6 alert alert-danger fade show d-flex justify-content-between" role="alert">

						<?php foreach ($_SESSION['errors'] as $error) {
							echo $error;
						} ?>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
						</div>
						<?php unset($_SESSION['errors']) ?>
						<?php }  ?>
						

						<div class="row">
							<div class="col-6">
  						  		<button type="submit" class="btn btn-primary mt-4">Редактировать</button>
  							</div>
						</div>
  						
					</form>
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
<?php } ?>