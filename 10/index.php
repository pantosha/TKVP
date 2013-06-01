<?php 
	include('functions.php');
	include("constants.php");
	
	$lived = lived_days($my_birthday);
?>
<!DOCTYPE html>
<html title="Лабораторная работа №10">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №10. Краткая биография</title>
	<section>
	<div class="container">
		<h1>Краткая биография</h1>
		<p><ol>
			<li><strong>ФИО:</strong> Тырым Пырым Тырымович
			<li><strong>Дата рождения:</strong> <?php echo birthday($my_birthday); ?>
			<li><strong>До следующего дня рождения:</strong> <?php echo days_before_birthday($my_birthday); ?>
			<li><strong>Прошло с рождения:</strong>
			<ul>
				<li><strong>Лет:</strong> <?php echo $lived['years']; ?>
				<li><strong>Месяцев:</strong> <?php echo $lived['months']; ?>
			<li><strong>Дней:</strong> <?php echo $lived['days']; ?>
			</ul>
			<li><strong>Место рождения:</strong> Бульбостан, район Картапляны, деревня Колорадово
			<li><strong>Родители:</strong>
			<ul>
				<li> Колорадский жук
				<li> Колорадская жук
			</ul>
			<li><strong>Семейное положение:</strong> женат.
			<li><strong>Телефон:</strong>
			<ul>
				<li><strong>Мобильный:</strong> +375 (29) 804-41-11
				<li><strong>Домашний:</strong> +375 (216) 28-11-19
			</ul>
			<li><strong>Электронная почта:</strong>
			<ul>
				<li><strong>Личный:</strong> bulba@tut.bs
			</ul>
		</ol>
	</div>
	</section>