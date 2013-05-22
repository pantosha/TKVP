<!DOCTYPE html>
<html title="Лабораторная работа №7">
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Лаба №7. Арифметическая прогрессия</title>
	<h1><center>Арифметическая прогрессия</center></h1>
	<div class="container">
	<?php
		define(D, 15);
		define(MIN, 1);
		define(MAX, 100);
		
		$a = $_GET['a0'];
		
		if (!(is_numeric($a)) || !( MIN <= $a && $a <= MAX)){
			echo "Значение a: $a";
			echo '<p class="alert">Неверно, начальное значение должно быть таким:<br/>0 < a < 100';
		} else {
			$sum = 0;
			echo '<ol>';
			for ($count = 0; $count < 5; $count++) {
				echo "<li>$a";
				$sum += $a;
				$a += D;
			}
			echo '</ol>';
			echo "<p class='result'>Сумма: $sum";
		}
	?>
	</div>