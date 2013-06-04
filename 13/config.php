<?php
	$host='localhost';
	$database='tkvp';
	$user='root';
	$password='';
	
	function open_connection()
	{
		global $host, $database, $user, $pswd;
		
		$mysqli =  mysqli_connect($host, $user, $password, $database);
		if (mysqli_connect_errno($mysqli)) {
			echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
			return false;
		}

		return $mysqli;
		/*$res = mysqli_query($mysqli, "SELECT 'Пожалуйста, не используюте ' AS _msg FROM DUAL");
		$row = mysqli_fetch_assoc($res);
		
		
		
		$connection = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
		mysql_select_db($database, $connection) or die("Не могу подключиться к базе.");
		
		return $connection;*/
	}
/*
	function ExecuteQuery($connection, $queryString)
	{
		$result = mysqli_query($connection, $queryString);
		if (!$result)
		{
			die('Неверный запрос: ' . mysql_error());
		}
		
		return $result;
	}
	*/
	function close_connection($connection)
	{
		mysqli_close($connection);
		//mysql_close($connection);
	}
?>