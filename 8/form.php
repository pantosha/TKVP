<!DOCTYPE html>
<html title="Лабораторная работа №8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №8. Биография</title>

	<!-- Если форма заполнена неверно -->
	<?php if (!empty($Errors)): ?>
		<div class="alert">
			<p>Заполните, пожалуйста, поля:
			<ul>
				<?php foreach($Errors as $value) echo "<li>$value\n"; ?>
			</ul>
		</div>
	<?php endif; ?>
	<!-- Конец. О неверном заполнении формы -->

	<h1><center>Биография</center></h1>
	<div class="container">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<fieldset>
			<legend>Личная информация:</legend>
			<table>
			<tr>
				<td><label for="email">E-mail: </label>
				<td><input id="email" type="email" name="email" <?php if (!empty($_POST['email'])) echo "value=\"{$_POST['email']}\""; ?> placeholder="example@mail.com" autocomplete="on"/>
			<tr>
				<td><label for="name">Имя: </label>
				<td><input id="name" name="name" <?php if (!empty($_POST['name'])) echo "value=\"{$_POST['name']}\""; ?> placeholder="Иван" autocomplete="on"/>
			<tr>
				<td><label for="surname">Фамилия: </label>
				<td><input id="surname" name="surname" <?php if (!empty($_POST['surname'])) echo "value=\"{$_POST['surname']}\""; ?> placeholder="Иванов" autocomplete="on"/>
			<tr>
				<td><label for="city">Место жительства: </label>
				<td><input id="city" name="city" <?php if (!empty($_POST['city'])) echo "value=\"{$_POST['city']}\""; ?> placeholder="Иваново" autocomplete="on"/>
			<tr>
				<td><label for="birthday">Дата рождения: </label>
				<td><input type="date" name="birthday" <?php if (!empty($_POST['birthday'])) echo "value=\"{$_POST['birthday']}\""; ?> placeholder="Дата рождения" autocomplete="on" min="1900-01-01"/>
			<tr>
				<td><td><select name="gender">
					<option value="" disabled <?php if (empty($_POST['gender'])) echo 'selected'; ?>>Укажите пол</option>
					<option value="men" <?php if (!empty($_POST['gender']) && $_POST['gender'] == 'men') echo 'selected'; ?>>Мужчина</option>
					<option value="women" <?php if (!empty($_POST['gender']) && $_POST['gender'] == 'women') echo 'selected'; ?>>Женщина</option>
				</select>
			</table>
		</fieldset>
		<fieldset>
			<legend>Предпочтения:</legend>
			<p><select name="genres[]" multiple>
				<?php $genres = array('action' => 'Боевик',
										'western' => 'Вестерн',
										'detective' => 'Детектив',
										'comedy' => 'Комедия'); ?>
				<option value="" disabled>Выберите любимый жанр</option>
				<?php foreach($genres as $genre => $name){
					echo '<option value="' . $genre . '"';
					if (isset($_POST[genres]) && in_array($genre, $_POST[genres]))
						echo " selected";
					echo ">" . $name . "</option>";
				} ?>
			</select>
		</fieldset>
		<fieldset>
			<legend>Пару слов о себе:</legend>
				<p><textarea name="comment" cols="40" rows="5"placeholder="Очень, очень хороший..."><?php echo $_POST['comment']; ?></textarea>
		</fieldset>
		<p><input name="POST_news" type="checkbox" <?php if(isset($_POST['POST_news'])) echo 'checked';?>> я хочу получать e-mail рассылку
		<p><input type="submit" value="Отправить"/>
	</form>
	</div>