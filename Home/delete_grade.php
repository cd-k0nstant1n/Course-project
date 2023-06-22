<?php
	include 'db_connection.php';
	$subject = $_GET['subject'];
	$sql = "SELECT " . $subject . " FROM students WHERE mail='" . $_GET['mail'] . "';";
	$result = mysqli_query($connection, $sql);
	$row = $result->fetch_assoc();
	$grade_index = (int)$_GET['grade'];
	$index = 0;
	$digits = str_split($row[$subject]);
	$new_string = "";
	$deleted = false;
			
	foreach ($digits as $index => $digit)
	{
		if ($index === $grade_index)
		{
			continue;
		}

		$new_string .= $digit;
	}
	
	if($new_string=="")
	{
		$new_string = "0";
	}

	$sql = "UPDATE students SET $subject = '$new_string' WHERE mail = '" . $_GET['mail'] . "';";
	$result = mysqli_query($connection, $sql);
	echo '<script>window.opener.updateFirstPage();</script>';
	echo "<script>window.close();</script>";
?>