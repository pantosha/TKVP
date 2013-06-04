<!DOCTYPE html>
<html title="Лабораторная работа №13">
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<link href="style.css" type="text/css" rel="stylesheet"/>
	<title>Лаба №13. Приёмная кампания</title>
	<div class="container">
		
		<?php if (!empty($Errors)): ?>
		<!-- Если форма заполнена неверно -->
			<div class="alert">
				<p>Проверьте, пожалуйста, поля:
				<ul>
					<?php foreach($Errors as $value) echo "<li>$value\n"; ?>
				</ul>
			</div>
		<!-- Конец. О неверном заполнении формы -->
		<?php endif; ?>
		
		<h1>Добавление абитуриента</h1>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<div class='center_div'>
				
					<?php 
						if (!empty($_SESSION['subjects'])) {
							foreach($_SESSION['subjects'] as $subject_id => $subject_name){
								echo "<p><label for=\"$subject_id\">$subject_name: </label>";
								echo "<input id=\"$subject_id\" name=\"$subject_id\" autocomplete=\"on\"/>";
							}
						}
					?>
				</div>
				<p><input type="submit" value="Добавить"/>
			</form>
	</div>