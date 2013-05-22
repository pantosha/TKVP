<?php
	define(MIN, -100);
	define(MAX, 100);
	
	function Valid($a){
		if (!(is_numeric($a)) || !( MIN <= $a && $a <= MAX))
			throw new Exception();
	}
?>
<!DOCTYPE html>
<html title="Лабораторная работа №7">
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title>Лаба №7. Квадратное уравнение</title>
	<h1><center>Квадратное уравнение</center></h1>
	<div class="container">
	<?php
		$a = $_GET['a'];
		$b = $_GET['b'];
		$c = $_GET['c'];
	try{
		Valid($a);
		Valid($b);
		Valid($c);
		
		echo "<p>У квадратного уравнения {$a}x^2 + {$b}x + {$c} = 0";
		
		$D = $b*$b - 4*$a*$c;
		if ($D < 0) {
			echo "<p>нет корней";
		} else {
			$x1 = (-$b + sqrt((float)D))/2*$a;
			$x2 = (-$b - sqrt((float)D))/2*$a;
			echo "<p>x1 = $x1";
			echo "<p>x2 = $x2";
		}
		
		/*
		else {
			$sum = 0;
			for ($count = 0; $count < 5; $count++) {
				echo "<p>$a";
				$sum += $a;
				$a += D;
			}
			echo "<p class='result'>$sum";
		}*/
	} catch(Exception $ex) {
		echo "Значение a: $a";
		echo '<p class="alert">Неверно, начальное значение должно быть таким:<br/>0 < a < 100';
	}
	?>
	</div>