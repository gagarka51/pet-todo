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
				<div class="col-12 text-center my-4">
					<h2>Добавление новой задачи</h2>
				</div>
				
			</div>
			<div class="row d-flex justify-content-center">
				<?php if(!empty($_SESSION['success'])) { ?>
					<div class="col-6 alert alert-info d-flex justify-content-between" role="alert">
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
					<form method="post" action="../handlers/create_task.php">
						<div class="row d-flex justify-content-center">
							<div class="col-md-4 d-none">
    							<input type="hidden" class="form-control" id="input" value="<?=$user['id']; ?>" name="user_id">
  							</div>
  							<div class="col-md-4">
    							<label for="inputName" class="form-label" title="Выбирайте название короткое и понятное">Название</label>
    							<input type="text" class="form-control" id="inputName" name="title">
  							</div>
  							<div class="col-md-2">
  						  		<label for="inputDate" class="form-label">Дата напоминания</label>
  						  		<input type="date" class="form-control" name="date_finished">
  							</div>
						</div>
						
						<div class="row mt-3 d-flex justify-content-center">
							<div class="col-md-6">
  								<label for="exampleFormControlTextarea1" class="form-label">Описание</label>
  								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
							</div>
							<div class="col-md-4 d-none">
    							<input type="hidden" class="form-control" id="input" name="date_create" value="<?=date('Y-m-d'); ?>">
  							</div>
						</div>
  						
						<div class="row d-flex justify-content-center">
							<?php if(!empty($_SESSION['errors'])) { ?>
								<div class="col-6 mt-4 alert alert-danger d-flex justify-content-between" role="alert">
							<?php foreach ($_SESSION['errors'] as $error) {
								echo $error;
							} ?>
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Закрыть"></button>
								</div>
							<?php unset($_SESSION['errors']) ?>
							<?php }  ?>
						</div>
  						
						<div class="row d-flex justify-content-center">
							<div class="col-6">
  						  		<button type="submit" class="btn btn-primary mt-4">Добавить задачу</button>
  							</div>
						</div>
  						
					</form>
				</div>
			</div>
			
		</div>
	</main>
<?php } ?>