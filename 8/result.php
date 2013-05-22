<!DOCTYPE html>
<html title="Лабораторная работа №8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №8. Результат</title>
	<h1><center>Биография</center></h1>
	<div class="container">
	<?php
		switch($_POST['gender']){
			case 'men':
				$born = 'Родился';
				break;
			case 'women':
				$born = 'Родилась';
				break;
			default:
				$born = 'Родилось';
				break;
		}
		$name = trim($_POST['name']);
		$surname = trim($_POST['surname']);
		$birthday = trim($_POST['birthday']);
		$city = trim($_POST['city']);
		echo "<p>Меня зовут $name $surname. $born $birthday. Есть такое место на планете Земля под названием $city, там я и живу.";
		
		$text_genres = '';
		$genres = array('action' => 'Боевик',
						'western' => 'Вестерн',
						'detective' => 'Детектив',
						'comedy' => 'Комедия');
		foreach($_POST['genres'] as $key)
			$text_genres .= "<li>$genres[$key]";
		echo "<p>Любимые жанры:\n<ul>$text_genres</ul>";
		
		$comment = trim($_POST['comment']);
		if(!empty($comment)){
			echo "<p>Не жалко хороших слов о себе:\n<p>$comment";
		}
	?>
	</div>