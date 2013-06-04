<?php
	define(MIN_MARK, 1);
	define(MAX_MARK, 10);
	
	require('config.php');
	
	session_start();
	
	function add_student($name, $surname, $specialty, $marks){
		
		if (!is_string($name) || !is_string($surname))
			return false;
		
		$connection = open_connection();
		if ($connection === false)
			return false;
		
		$result = mysqli_query($connection, "INSERT INTO student (Name, Surname, Specialty_Id) VALUES ('$name', '$surname', $specialty)");
		
		$student_id = mysqli_insert_id($connection); // получаем id студента
		
		foreach($marks as $subject_id => $mark){
			// сохраняем в базу оценки
			$result = $result && mysqli_query($connection,
			"INSERT INTO student_subject (Student_Id, Subject_Id, Mark) VALUES ($student_id, $subject_id, $mark)");
		}
		close_connection($connection);
		
		return $result;
	}
	
	function get_specialties(){
		$connection = open_connection();
			
		if ($connection === false)
			return false;
				
		$result = mysqli_query($connection, "SELECT Id, Name FROM specialty");
			
		while ($row = mysqli_fetch_assoc($result)) {
			$specialties[$row['Id']] = $row['Name'];
		}
		
		mysqli_free_result($result);
		close_connection($connection);
		
		return $specialties;
	}
	
	function get_subjects($specialty_id) {
		$connection = open_connection();
		
		if ($connection === false)
			return false;
		
		//$query = "SELECT Name FROM specialty_subject, subject WHERE Specialty_Id = 8 AND Subject_Id = Id";
		$query = "SELECT Id, Name FROM specialty_subject, subject WHERE Specialty_Id = $specialty_id AND Subject_Id = Id";
		if ($result = mysqli_query($connection, $query)) {
			
			while ($row = mysqli_fetch_assoc($result)) {
				$subjects[$row['Id']] = $row['Name'];
			}
			mysqli_free_result($result);
		} else
			$subjects = false;
		
		mysqli_close($connection);
		return $subjects;
	}
	
	if (!isset($_SESSION['specialty_id'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Проверка
			if (empty($_POST['name']))
				$Errors['name'] = 'Имя абитуриента';
			if (empty($_POST['surname']))
				$Errors['surname'] = 'Фамилия абитуриента';
			if (empty($_POST['specialty_id']))
				$Errors['specialty_id'] = 'Специальность';
			
			//если ошибок не найдено
			if (!isset($Errors)) {
			
				$_SESSION['name'] = $_POST['name'];
				$_SESSION['surname'] = $_POST['surname'];
				$_SESSION['specialty_id'] = $_POST['specialty_id'];
				$_SESSION['subjects'] = get_subjects($_SESSION['specialty_id']);
				
				include 'form_add_student_mark.php';
			} else {
				include 'form_add_student.php';
			}
		} else {
			include 'form_add_student.php';
		}
	} else {
	// второй этап. Ввод баллов по предметам
	// проверили оценки и создали массив с ними		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($_SESSION['subjects'] as $subject_id => $subject_name) {
			
				if(!empty($_POST[$subject_id]) && MIN_MARK <= $_POST[$subject_id] && $_POST[$subject_id] <= MAX_MARK)
					$marks[$subject_id] = $_POST[$subject_id];
				else
					$Errors[$subject_id] = $subject_name;
			
			}
			
			if(empty($Errors)) {
				$result = add_student($_SESSION['name'], $_SESSION['surname'], $_SESSION['specialty_id'], $marks);
				
				unset($_SESSION['name']);
				unset($_SESSION['surname']);
				unset($_SESSION['specialty_id']);
				unset($_SESSION['subjects']);
				
				include $result === false ? 'error.php' : 'success.php';
			} else {
				include 'form_add_student_mark.php';
			}
		} else {
			include 'form_add_student_mark.php';
		}
	}	
?>