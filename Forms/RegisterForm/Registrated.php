<?php
	$username = "root";
	$servername = "localhost";
	$password = "";
	$dbname = "journal_schema";
	
	try
	{
		$connection = new mysqli($servername, $username, $password, $dbname);
		
		if($_POST["role"] == "student")
		{
			$name = $_POST["first_name"];
			$family_name = $_POST["family_name"];
			$class = $_POST["class"];
			$class_number = $_POST["class_number"];
			$mail = $_POST["mail"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			$password = password_hash($password, PASSWORD_BCRYPT);
			
			$name = mysqli_real_escape_string($connection, $name);
			$family_name = mysqli_real_escape_string($connection, $family_name);
			$class = mysqli_real_escape_string($connection, $class);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
			$password = mysqli_real_escape_string($connection, $password);
			
			$sql = "INSERT INTO students (name, family_name, class, class_number, mail, phone, password) VALUES ('$name', '$family_name', '$class', $class_number, '$mail', '$phone', '$password')";
			
			if(!mysqli_query($connection, $sql))
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
			else
			{
				header("Location: ../LoginForm/GradeLogWebsite.html");
			}
		}
		else if($_POST["role"] == "teacher")
		{
			$name = $_POST["first_name"];
			$family_name = $_POST["family_name"];
			$mail = $_POST["mail"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			$password = password_hash($password, PASSWORD_BCRYPT);
			$subject = $_POST["subject"];
			
			$name = mysqli_real_escape_string($connection, $name);
			$family_name = mysqli_real_escape_string($connection, $family_name);
			$subject = mysqli_real_escape_string($connection, $subject);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
			$password = mysqli_real_escape_string($connection, $password);
			
			if(isset($_POST["class_teacher?"]))
			{
				$class = $_POST["class"];
			}
			else
			{
				$class = "FALSE";
			}
			
			$class = mysqli_real_escape_string($connection, $class);
			$sql = "INSERT INTO teachers (name, family_name, mail, phone, password, subject, class_teacher) VALUES ('$name', '$family_name', '$mail', '$phone', '$password', '$subject', '$class')";
			
			if(!mysqli_query($connection, $sql))
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
			else
			{
				header("Location: ../LoginForm/GradeLogWebsite.html");
			}
		}
		else if($_POST["role"] == "parent")
		{
			$name = $_POST["name"];
			$family = $_POST["family"];
			$student_class = $_POST["student_class"];
			$student_class_number = $_POST["student_class_number"];
			$mail = $_POST["mail"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			$password = password_hash($password, PASSWORD_BCRYPT);
			
			$name = mysqli_real_escape_string($connection, $name);
			$family = mysqli_real_escape_string($connection, $family);
			$student_class = mysqli_real_escape_string($connection, $student_class);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
			$password = mysqli_real_escape_string($connection, $password);
		
			$sql = "INSERT INTO parents (name, family, student_class, student_class_number, mail, phone, password) VALUES ('$name', '$family', '$student_class', '$student_class_number', '$mail', '$phone', '$password')";
			
			if(!mysqli_query($connection, $sql))
			{
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
			}
			else
			{
				header("Location: ../LoginForm/GradeLogWebsite.html");
			}
		}
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
	
mysqli_close($connection);
?>