<!DOCTYPE html>
<html title="Лабораторная работа №11">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №11. Регулярные выражения</title>
	<div class="container">
		<!-- Если форма заполнена неверно -->
		<?php if (!empty($Errors)): ?>
			<div class="alert">
				<p>Проверьте, пожалуйста, поля:
				<ul>
					<?php foreach($Errors as $value) echo "<li>$value\n"; ?>
				</ul>
			</div>
		<?php endif; ?>
		<!-- Конец. О неверном заполнении формы -->
		<h1>Регулярные выражения</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class='center_div'>
				<p><label for="email">E-mail: </label>
				<input id="email" name="email" <?php if (!empty($_POST['email'])) echo "value=\"{$_POST['email']}\""; ?> placeholder="example@mail.com" autocomplete="on"/>
				<p><label for="phone">Телефон: </label>
				<input id="phone" name="phone" <?php if (!empty($_POST['phone'])) echo "value=\"{$_POST['phone']}\""; ?> placeholder="(012)345-67-89" autocomplete="on"/>
				<p><label for="password">Пароль: </label>
				<input id="password" name="password" type='password' <?php if (!empty($_POST['password'])) echo "value=\"{$_POST['password']}\""; ?> autocomplete="on"/>
				</div>
				<p><input type="submit" value="Отправить"/>
			</form>
	</div>