<?php
	require('config.php');
	
	function add_subject($name){
		if (!is_string($name))
			return false;
		
		$connection = open_connection();
		
		if ($connection === false)
			return false;
		
		$result = mysqli_query($connection, "INSERT INTO subject (Name) VALUES ('$name')");
		
		close_connection($connection);
		
		return $result;
	}

	if (!empty($_POST['name']))
		include add_subject($_POST['name']) !== false ? 'success.php' : 'error.php';
	else {
		$Errors['name'] = 'Название предмета';
		include 'form_add_subject.php';
	}
?>