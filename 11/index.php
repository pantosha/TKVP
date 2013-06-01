<?php
// Проверяем ошибки
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// email
	$email = $_POST['email'];
	if (!preg_match('/^([a-z0-9_\.-]+)@([a-z0-9_\.-]+)\.([a-z\.]{2,6})$/', $email))
		$Errors['email'] = 'E-mail';
	
	//	телефон
	$phone = $_POST['phone'];
	if (!preg_match('/^\([0-9]{3}\)([0-9]{3})-([0-9]{2})-([0-9]{2})$/', $phone))
		$Errors['phone'] = 'Телефон (в формате (012)345-67-89)';
	
	// пароль
	$password = $_POST['password'];
	//if (!preg_match('/^(?=.*\d){2,}(?=.*[a-z])(?=.*[A-Z]).{8,64}$/', $password))
	if ( !preg_match("/.*\d.*\d/", $password) || // наличие двух цифр
		!preg_match("/[a-z]{1,}/", $password) || // наличие одной строчной латинской буквы
		!preg_match("/[A-Z]{1,}/", $password) || // наличие одной заглавной латинской буквы
		preg_match("/\s/", $password) || // отсутствие пробелов
		!preg_match("/.{8,}/", $password) // длина от 8 символов
	)
		$Errors['password'] = 'Пароль';
	include !isset($Errors) ? 'result.php' : 'form.php';
} else
	include 'form.php';
?>