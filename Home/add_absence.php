<?php
	include 'db_connection.php';
	session_start();
	$connection = getDbConnection();
	$mail = $_GET['mail'];
	$subject = $_GET['subject'];
	$sql = "UPDATE students SET " . $subject . "_absences = " . $subject . "_absences + 1 WHERE mail = '" . $mail . "';";
	mysqli_query($connection, $sql);
	header("Location: Journal.php");
?>