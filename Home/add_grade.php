<?php
	include 'db_connection.php';
	session_start();
	$connection = getDbConnection();
	$grade = $_GET['name'];
	$id = $_GET['row'];
	$sql = 'SELECT subject FROM teachers WHERE mail="' . $_SESSION['mail'] . '";';
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$sql = 'SELECT students.name, students.family_name, students.class, students.mail, students.' . $row['subject'] . ' FROM students JOIN subjects ON students.class = subjects.class JOIN teachers ON subjects.' . $row['subject'] . ' = teachers.mail WHERE teachers.mail="' . $_SESSION['mail'] . '";';
	$result = mysqli_query($connection, $sql);
	$subject = $row['subject'];
	
	for($i = 0; $i < $id; $i++)
	{
		$row = $result->fetch_assoc();
	}
	
	$sql = "UPDATE students SET $subject = CONCAT($subject, ',$grade') WHERE mail = '" . $row['mail'] . "';";
	$result = mysqli_query($connection, $sql);
	header("Location: Journal.php");
?>