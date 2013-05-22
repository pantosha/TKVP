<html title="Лабораторная работа №6">
<meta http-equiv="content-type" content="text/html; charset=utf-8"/> 
<title>Тестируем PHP</title>
<h2><center>Параметры запроса</center></h2>
<ul>
<?php
foreach($_GET as $key => $value){
	echo "<li>$key: ";
	if (is_array($value)) {
		echo '<ul>';
		foreach($value as $element){
			echo "<li> $element";
		}
		echo '</ul>';
	} else {
		echo $value;
	}
}
?>
</ul>