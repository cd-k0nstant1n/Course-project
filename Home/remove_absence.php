<?php
	include 'db_connection.php';
	session_start();
	$connection = getDbConnection();
	$mail = $_GET['mail'];
	$subject = $_GET['subject'];
	$sql = "SELECT " . $subject . "_absences" . " FROM students WHERE mail = '" . $mail . "';";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	
	if($row[$subject . "_absences"] > 0)
	{
		$sql = "UPDATE students SET " . $subject . "_absences = " . $subject . "_absences - 1 WHERE mail = '" . $mail . "';";
		mysqli_query($connection, $sql);
	}
	
	header("Location: Journal.php");
?>