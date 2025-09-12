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
<?php } ?>