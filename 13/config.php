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
			echo "�� ������� ������������ � MySQL: " . mysqli_connect_error();
			return false;
		}

		return $mysqli;
		/*$res = mysqli_query($mysqli, "SELECT '����������, �� ����������� ' AS _msg FROM DUAL");
		$row = mysqli_fetch_assoc($res);
		
		
		
		$connection = mysql_connect($host, $user, $pswd) or die("�� ���� ����������� � MySQL.");
		mysql_select_db($database, $connection) or die("�� ���� ������������ � ����.");
		
		return $connection;*/
	}
/*
	function ExecuteQuery($connection, $queryString)
	{
		$result = mysqli_query($connection, $queryString);
		if (!$result)
		{
			die('�������� ������: ' . mysql_error());
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