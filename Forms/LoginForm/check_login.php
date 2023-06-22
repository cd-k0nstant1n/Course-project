<?php

	include '../../Home/db_connection.php';
		
		$mail = $_POST["mail"];
		$password = $_POST["password"];
		session_start();
		$sql = "SELECT * FROM students WHERE mail='$mail'";
		$result = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($result) > 0)
		{
			$row = $result->fetch_assoc();
			$hashed_password = $row['password'];
			
			if (password_verify($password, $hashed_password))
			{
				$_SESSION["mail"] = $mail;
				$_SESSION["role"] = "student";
				header("Location: ../../Home/Home.php");
			}
			else
			{
				$_SESSION["error"] = "Невалидна парола или имейл. Опитай отново.";
				header("Location: Login_form.php");
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
					$_SESSION["mail"] = $mail;
					
					if($mail == "admin@admin.com")
					{
						$_SESSION["role"] = "admin";
					}
					else
					{
						$_SESSION["role"] = "teacher";
					}
					
					header("Location: ../../Home/Home.php");
				}
				else
				{
					$_SESSION["error"] = "Невалидна парола или имейл. Опитай отново";
					header("Location: Login_form.php");
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
						$_SESSION["mail"] = $mail;
						$_SESSION["role"] = "parent";
						header("Location: ../../Home/Home.php");
					}
					else
					{
						$_SESSION["error"] = "Невалидна парола или имейл. Опитай отново.";
						header("Location: Login_form.php");
					}
				}
				else
				{
					$_SESSION["error"] = "Невалидна парола или имейл. Опитай отново.";
					header("Location: Login_form.php");
				}
			}
		}
	
mysqli_close($connection);
?>