<?php
define(N, 15);
define(B0, 2);
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

//my_print_r($array);
print_r($array);
?>