<?php
define(N, 15);
define(Q, 3);

include 'my_print_r.php';

// Заполнение массива геометрической прогрессией
$b = 2;
for ($i = 0; $i < N; $i++){
	$geometric[] = $b;
	$b *= Q;
}

// Числа Фибоначчи
$fibonacci[] = $fibonacci[] = 1;
for($i = 2; $i < N; $i++ ){
	$fibonacci[] = $fibonacci[$i-1] + $fibonacci[$i-2];
}

// Объединение массивов в один ассоциативный
$array = array('geometric' => $geometric, 'fibonacci' => $fibonacci);
?>

<!DOCTYPE html>
<html title="Лабораторная работа №9">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №9. Массивы</title>
	<h1>Массивы</h1>
	<div class="container">
		<?php print_to_html($array); ?>
	</div>