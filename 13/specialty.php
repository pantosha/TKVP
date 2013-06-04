<?php
	require('config.php');
	
	function add_specialty($name, $budjet, $subjects){
		// Проверка
		if (!is_string($name))
			return false;
			
		if (!is_numeric($budjet))
			return false;	
			
		if (!is_array($subjects))
			return false;
		
		// Работа с соединением
		$connection = open_connection();
		
		if ($connection === false)
			return false;
		
		$result = mysqli_query($connection, "INSERT INTO specialty (Name, Budjet) VALUES ('$name', $budjet)");
		$specialty_id = mysqli_insert_id($connection);
		foreach($subjects as $subject_id)
			$result = $result && mysqli_query($connection, "INSERT INTO specialty_subject (Specialty_Id, Subject_Id) VALUES ($specialty_id, $subject_id)");
		
		close_connection($connection);
		
		return $result;
	}
	
	function get_subjects(){
		// Работа с соединением
		$connection = open_connection();
		
		if ($connection === false)
			return false;
		
		$result = mysqli_query($connection, "SELECT * FROM subject");
		
		while ($row = mysqli_fetch_assoc($result)){
			$subjects[$row['Id']] = $row['Name'];
		}
		
		mysqli_free_result($result);
		
		close_connection($connection);
		
		return $subjects;
	}
	
	if ($_GET['s'] == '1') {
		// Проверка
		if (empty($_GET['name']))
			$Errors['name'] = 'Название специальности';
		if (empty($_GET['budjet']))
			$Errors['budjet'] = 'Бюджетные места';
		if (empty($_GET['subjects_id']))
			$Errors['subjects_id'] = 'Предметы';
		
		if (!isset($Errors))
			include add_specialty($_GET['name'], $_GET['budjet'], $_GET['subjects_id']) ? 'success.php' : 'error.php';
		else
			include 'form_add_specialty.php';
	} else {
		include 'form_add_specialty.php';
	}
?>