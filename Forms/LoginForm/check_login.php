<?php

	include '../../Home/db_connection.php';
		
		$mail = $_POST["mail"];
		$password = $_POST["password"];
		
		$sql = "SELECT * FROM students WHERE mail='$mail'";
		$result = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			$row = $result->fetch_assoc();
			$hashed_password = $row['password'];
			
			if (password_verify($password, $hashed_password))
			{
				session_start();
				$_SESSION["mail"] = $mail;
				$_SESSION["role"] = "student";
				header("Location: ../../Home/Home.php");
			}
			else
			{
				header("Location: Login_form.php");
				$_SESSION["error"] = "Incorrect username or password. Please try again.";
			}
		}
		else
		{
			$sql = "SELECT * FROM teachers WHERE mail='$mail'";
			$result = mysqli_query($connection, $sql);
			
			if(mysqli_num_rows($result) > 0)
			{
				$row = $result->fetch_assoc();
				$hashed_password = $row['password'];
				
				if (password_verify($password, $hashed_password))
				{
					session_start();
					$_SESSION["mail"] = $mail;
					$_SESSION["role"] = "teacher";
					header("Location: ../../Home/Home.php");
				}
				else
				{
					header("Location: Login_form.php");
					$_SESSION["error"] = "Incorrect username or password. Please try again.";
				}
			}
			else
			{
				$sql = "SELECT * FROM parents WHERE mail='$mail'";
				$result = mysqli_query($connection, $sql);
				
				if(mysqli_num_rows($result) > 0)
				{
					$row = $result->fetch_assoc();
					$hashed_password = $row['password'];
					
					if (password_verify($password, $hashed_password))
					{
						session_start();
						$_SESSION["mail"] = $mail;
						$_SESSION["role"] = "parent";
						header("Location: ../../Home/Home.php");
					}
					else
					{
						header("Location: Login_form.php");
						$_SESSION["error"] = "Incorrect username or password. Please try again.";
					}
				}
				else
				{
					header("Location: Login_form.php");
					$_SESSION["error"] = "Incorrect username or password. Please try again.";
				}
			}
		}
	
mysqli_close($connection);
?>