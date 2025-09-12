<?php 
	session_start();
	if (empty($_SESSION['auth'])) {
		header('Location: ../index.php');
	} else{
	
	include_once "../config/db.php";
	include_once "../handlers/pagination.php";

	$user_id = $_SESSION['user_id'];
	$user = $db->query("SELECT * FROM `users` WHERE `id` ='$user_id'")->fetch_assoc();
	$tasks = $db->query("SELECT * FROM `tasks` WHERE `user_id` ='$user_id'")->fetch_all(MYSQLI_ASSOC);
?>

	<main>
		<div class="container">
			<div class="row">
				
					<?php 
					if (empty($tasks)) {
					?>
				<div class="main col-12 my-5 text-center">	
						<img src="../assets/img/iconfinder-social-media-4341269_120580.svg" alt="boy" class="mt-3 mb-5 w-25">
						<h2>У вас пока ничего не запланировано..</h2>
						<a class="btn btn-primary mt-3" href="task.php">Добавить задачу</a>
				</div>
			</div>
					<?php } else { ?>

			<div class="row">
				<h3 class="my-4">Мои задачи</h3>
					<ol class="list-group list-group-numbered">
				<?php foreach ($tasks_pagination as $tasks) { ?>
  						<li class="list-group-item d-flex justify-content-between align-items-start">
    						<div class="ms-2 me-auto">

      						<div class="fw-bold"><?=$tasks['title'] ?> 
								<?php if (date("Y-m-d") <= $tasks['date_finished']){ ?>
    								 <span class="badge bg-success rounded-pill">Активно</span>
    							<?php } else {  ?>
    								<span class="badge bg-danger rounded-pill ">Просрочено</span>
    							<?php 
    								}
    							?>
      						</div>
      						
      							<?=$tasks['description'] ?>
    						</div>
    						

    						<div class="group-buttons">
    							<a href="edit_task.php?<?=$tasks['id']; ?>" class="btn btn-primary" title="Редактировать"><img src="../assets/img/pencil.svg" alt="иконка редактирования задачи"></a>
    							<a href="#" class="btn btn-success" title="Завершить"><img src="../assets/img/calendar2-x.svg" alt="иконка завершения задачи"></a>
    							<a href="../handlers/delete_task.php?<?=$tasks['id']; ?>" class="btn btn-danger" title="Удалить"><img src="../assets/img/trash3.svg" alt="иконка удаления задачи"></a>
    						</div>
  						</li>
  				<?php } 
  				?>
					
				</ol>
				
					<nav class="mt-5">
  						<ul class="pagination justify-content-center">
  						<?php 
  							for ($i = 1; $i <= $count_all_pages; $i++)
								{ 
						?>
    						<li class="page-item">
    							<?="<a href=tasks.php?current_page=".$i." class='page-link'>".$i." </a>"; ?>
    						</li>
    					<?php 	
						} 
						?>
  						</ul>
					</nav>
				
				<?php } ?>
			</div>
		</div>
	</main>
<?php } ?>