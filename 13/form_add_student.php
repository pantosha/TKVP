<!DOCTYPE html>
<html title="Лабораторная работа №13">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №13. Приёмная кампания</title>
	<div class="container">
		
		<?php if (!empty($Errors)): ?>
		<!-- Если форма заполнена неверно -->
			<div class="alert">
				<p>Проверьте, пожалуйста, поля:
				<ul>
					<?php foreach($Errors as $value) echo "<li>$value\n"; ?>
				</ul>
			</div>
		<!-- Конец. О неверном заполнении формы -->
		<?php endif; ?>
		
		<h1>Добавление абитуриента</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class='center_div'>
					<p><label for="name">Имя: </label>
					<input id="name" name="name" placeholder="Иван" autocomplete="on"/>
					<p><label for="surname">Фамилия: </label>
					<input id="surname" name="surname" placeholder="Иванов" autocomplete="on"/>
					<p><select name="specialty_id">
					<option value="" disabled>Выберите специальность</option>
					<?php
						$specialties = get_specialties();
						foreach ($specialties as $id => $name) {
							echo '<option value="' . $id . '"';
							if (isset($_POST['subjects_id']) && in_array($id, $_POST['subjects_id']))
								echo " selected";
							echo ">" . $name . "</option>";
						}
					?>
					</select>
				</div>
				<p><input type="submit" value="Добавить"/>
			</form>
	</div>