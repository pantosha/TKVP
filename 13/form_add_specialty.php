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
		
		<h1>Добавление специальности</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
				<div class='center_div'>
					<input name="s" value="1" type="hidden">
					<p><label for="name">Название: </label>
					<input id="name" name="name" placeholder="Училово" autocomplete="on"/>
					<p><label for="budjet">Бюджетные места: </label>
					<input id="budjet" name="budjet" placeholder="10" autocomplete="on"/>
					<p><select name="subjects_id[]" multiple>
					<option value="" disabled>Выберите предметы для сдачи</option>
					<?php
						$subjects = get_subjects();
						foreach($subjects as $id => $name){
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