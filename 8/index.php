<?php
// Проверяем ошибки
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['email'])) $Errors['email'] = 'E-mail';
	if (empty($_POST['name'])) $Errors['name'] = 'Имя';
	if (empty($_POST['surname'])) $Errors['surname'] = 'Фамилия';
	if (empty($_POST['city'])) $Errors['city'] = 'Место жительства';
	if (empty($_POST['birthday'])) $Errors['birtday'] = 'Дата рождения';
	if (empty($_POST['gender'])) $Errors['gender'] = 'Пол';
	if (!isset($_POST['genres'])) $Errors['genres'] = 'Любимый жанр';

	include !isset($Errors) ? 'result.php' : 'form.php';
} else
	include 'form.php';
?>