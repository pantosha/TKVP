<!DOCTYPE html>
<html title="Лабораторная работа №7">
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Лаба №7. Геометрическая прогрессия</title>
	<h1><center>Геометрическая прогрессия</center></h1>
	<div class="container">
	<?php
		define(D, -1.5);
		define(MIN, -100);
		define(MAX, 100);
		
		$b = $_GET['b0'];
		
		if (!(is_numeric($b)) || !( MIN <= $b && $b <= MAX)){
			echo "Значение b: $b";
			echo '<p class="alert">Неверно, начальное значение должно быть таким:<br/>0 < b < 100';
		} else {
			$sum = 0;
			echo '<ol>';
			for ($count = 1; $count <= 15; $count++) {
				echo "<li>$b";
				$sum += $b;
				$b *= D;
			}
			echo '</ol>';
			echo "<p class='result'>Сумма: $sum";
		}
	?>
</div>