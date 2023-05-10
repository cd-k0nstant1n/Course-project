<?php
	$username = "root";
	$servername = "localhost";
	$password = "1234567890";
	$dbname = "journal_schema";
	
	try
	{
		$connection = new mysqli($servername, $username, $password, $dbname);
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
	
	function getDbConnection()
	{
		global $connection;
		return $connection;
	}
?>