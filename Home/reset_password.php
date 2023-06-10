<?php
	include 'db_connection.php';
	session_start();
	$connection = getDbConnection();
	$current_password = $_POST["current_password"];
	$new_password = $_POST["new_password"];
	$sql = "SELECT students.password FROM students WHERE mail = '" . $_SESSION['mail'] . "';";
	$result = mysqli_query($connection, $sql);
	
	if(mysqli_num_rows($result) == 0)
	{
		$sql = "SELECT parents.password FROM parents WHERE mail = '" . $_SESSION['mail'] . "';";
		$result = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($result) == 0)
		{
			$sql = "SELECT teachers.password FROM teachers WHERE mail = '" . $_SESSION['mail'] . "';";
			$result = mysqli_query($connection, $sql);
			
			$row = $result->fetch_assoc();
			$hashed_password = $row['password'];
				
			if (password_verify($current_password, $hashed_password))
			{
				$new_password = password_hash($new_password, PASSWORD_BCRYPT);
				$new_password = mysqli_real_escape_string($connection, $new_password);
				$sql = "UPDATE teachers SET password = '" . $new_password . "' WHERE mail = '" . $_SESSION['mail'] . "';";
				$result = mysqli_query($connection, $sql);
				header("Location: ../Forms/LoginForm/Login_form.php");
			}
			else
			{
				header("Location: MyProfile.php");
			}
		}
		else
		{
			$row = $result->fetch_assoc();
			$hashed_password = $row['password'];
				
			if (password_verify($current_password, $hashed_password))
			{
				$new_password = password_hash($new_password, PASSWORD_BCRYPT);
				$new_password = mysqli_real_escape_string($connection, $new_password);
				$sql = "UPDATE parents SET password = '" . $new_password . "' WHERE mail = '" . $_SESSION['mail'] . "';";
				$result = mysqli_query($connection, $sql);
				header("Location: ../Forms/LoginForm/Login_form.php");
			}
			else
			{
				header("Location: MyProfile.php");
			}
		}
	}
	else
	{
		$row = $result->fetch_assoc();
		$hashed_password = $row['password'];
			
		if (password_verify($current_password, $hashed_password))
		{
			$new_password = password_hash($new_password, PASSWORD_BCRYPT);
			$new_password = mysqli_real_escape_string($connection, $new_password);
			$sql = "UPDATE students SET password = '" . $new_password . "' WHERE mail = '" . $_SESSION['mail'] . "';";
			$result = mysqli_query($connection, $sql);
			header("Location: ../Forms/LoginForm/Login_form.php");
		}
		else
		{
			header("Location: MyProfile.php");
		}
	}
?>