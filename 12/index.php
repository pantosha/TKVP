<?php
	define(root, 'files');
	// очень криво
	function combine_path($first, $second){
		return $first . '/' . $second;
	}

	$dir = empty($_GET['dir']) ? root : $_GET['dir'];
	
	if (!empty($_GET['rem'])){
		$path = $_GET['rem'];
		if (file_exists($path) && unlink($path)){
			$dir = dirname($path);
			$logstring = "$path удален\n";
		}
	}	

	if(!is_dir($dir)){
		echo "Ошибка, каталога $dir не существует!";
		die;
	}
		
	if (realpath(root) != realpath($dir))
		$dirs['..'] = dirname($dir);
		
	foreach (scandir($dir) as $entry){
		if ($entry != '.' && $entry != '..') {
			$full_name = combine_path($dir, $entry);
			// каталог к каталогу
			if (is_dir($full_name))
				$dirs[$entry] = $full_name;
			// файл к файлу
			else if (is_file(combine_path($dir, $entry)))
				$files[$entry] = $full_name;
		}
	}
?>
<!DOCTYPE html>
<html title="Лабораторная работа №12">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №12. Файловый менеджер</title>
	<div class="container">
		<h1>Файловый менеджер</h1>
		<table>
			<tr>
				<th>Имя
				<th>Операции
			<?php
				if (!empty($dirs))
					foreach($dirs as $name => $path){
						echo "\n<tr class=\"directory\"><td>";
						echo "<a href=\"{$_SERVER['PHP_SELF']}?dir=$path\">$name</a><td>[DIR]";
					}
					
				if (!empty($files))
					foreach($files as $name => $path){
						echo "\n<tr class=\"file\"><td>";
						echo "<a href=\"$path\">$name</a><td>" . filesize($path) / 1000 . 'KB ';
						echo "<a href=\"{$_SERVER['PHP_SELF']}?rem=$path\">[X]</a>";
					}
			?>
		</table>
		<?php if (isset($logstring)) echo '<p>' . $logstring; ?>
	</div>