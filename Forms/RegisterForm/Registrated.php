<?php
		session_start();
		include '../../Home/db_connection.php';
		$code = $_POST["code"];
		$sql = "SELECT * FROM code;";
		$result = mysqli_query($connection, $sql);
		$row = $result->fetch_assoc();
		
		if($_POST["role"] == "student")
		{
			$name = $_POST["first_name"];
			$family_name = $_POST["family_name"];
			$class = $_POST["class"];
			$class_number = $_POST["class_number"];
			$mail = $_POST["mail"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			
			$name = mysqli_real_escape_string($connection, $name);
			$family_name = mysqli_real_escape_string($connection, $family_name);
			$class = mysqli_real_escape_string($connection, $class);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
			
			if($row['Code'] == $code)
			{	
				
				
					$sql = "SELECT mail FROM students WHERE mail='" . $mail . "';";
					
					if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
					{
						$_SESSION["error"] = "Вече същества акаунт с този имейл.";
						header("Location: ../RegisterForm/RegistrationForm.php");
					}
					else
					{
						if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password))
						{
							$sql = "UPDATE code SET Code = '';";
							mysqli_query($connection, $sql);
							$password = password_hash($password, PASSWORD_BCRYPT);
							$password = mysqli_real_escape_string($connection, $password);
							$sql = "INSERT INTO students (name, family_name, class, class_number, mail, phone, password) VALUES ('$name', '$family_name', '$class', $class_number, '$mail', '$phone', '$password')";
							if(!mysqli_query($connection, $sql))
							{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
							}
							header("Location: ../LoginForm/Login_form.php");
						}
						else
						{
							$_SESSION["error"] = "Паролата трябва да съдържа поне една малка буква, една главна буква, една цифра и да е дълга поне 8 знака!";
							header("Location: ../RegisterForm/RegistrationForm.php");
						}
					}
				
			}
			else
			{
				$_SESSION["error"] = "Невалиден код за достъп.";
				header("Location: ../RegisterForm/RegistrationForm.php");
			}
		}
		else if($_POST["role"] == "teacher")
		{
			$name = $_POST["first_name"];
			$family_name = $_POST["family_name"];
			$mail = $_POST["mail"];
			$phone = $_POST["phone"];
			$password = $_POST["password"];
			$subject = $_POST["subject"];
			
			$name = mysqli_real_escape_string($connection, $name);
			$family_name = mysqli_real_escape_string($connection, $family_name);
			$subject = mysqli_real_escape_string($connection, $subject);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
			$subject = mysqli_real_escape_string($connection, $subject);
			
			if(isset($_POST["class_teacher?"]))
			{
				$class = $_POST["class"];
			}
			else
			{
				$class = "FALSE";
			}
			
			$class = mysqli_real_escape_string($connection, $class);
			
			if($row['Code'] == $code)
			{
				
					$sql = "SELECT mail FROM teachers WHERE mail='" . $mail . "';";
					
					if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
					{
						$_SESSION["error"] = "Вече същества акаунт с този имейл.";
						header("Location: ../RegisterForm/RegistrationForm.php");
					}
					else
					{
						if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password))
						{
							$sql = "UPDATE code SET Code = '';";
							mysqli_query($connection, $sql);
							$password = password_hash($password, PASSWORD_BCRYPT);
							$password = mysqli_real_escape_string($connection, $password);
							$sql = "INSERT INTO teachers (name, family_name, mail, phone, password, subject, class_teacher) VALUES ('$name', '$family_name', '$mail', '$phone', '$password', '$subject', '$class')";
							if(!mysqli_query($connection, $sql))
							{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
							}
							header("Location: ../LoginForm/Login_form.php");
						}
						else
						{
							$_SESSION["error"] = "Паролата трябва да съдържа поне една малка буква, една главна буква, една цифра и да е дълга поне 8 знака!";
							header("Location: ../RegisterForm/RegistrationForm.php");
						}
					}
				
			}
			else
			{
				$_SESSION["error"] = "Невалиден код за достъп.";
				header("Location: ../RegisterForm/RegistrationForm.php");
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
			
			$name = mysqli_real_escape_string($connection, $name);
			$family = mysqli_real_escape_string($connection, $family);
			$student_class = mysqli_real_escape_string($connection, $student_class);
			$mail = mysqli_real_escape_string($connection, $mail);
			$phone = mysqli_real_escape_string($connection, $phone);
		
			
			if($row['Code'] == $code)
			{
				
				
					$sql = "SELECT mail FROM parents WHERE mail='" . $mail . "';";
					
					if(mysqli_num_rows(mysqli_query($connection, $sql)) > 0)
					{
						$_SESSION["error"] = "Вече същества акаунт с този имейл.";
						header("Location: ../RegisterForm/RegistrationForm.php");
					}
					else
					{
						if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password))
						{
							$sql = "UPDATE code SET Code = '';";
							mysqli_query($connection, $sql);
							$password = password_hash($password, PASSWORD_BCRYPT);
							$password = mysqli_real_escape_string($connection, $password);
							$sql = "INSERT INTO parents (name, family, student_class, student_class_number, mail, phone, password) VALUES ('$name', '$family', '$student_class', '$student_class_number', '$mail', '$phone', '$password')";
							if(!mysqli_query($connection, $sql))
							{
								echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
							}
							header("Location: ../LoginForm/Login_form.php");
						}
						else
						{
							$_SESSION["error"] = "Паролата трябва да съдържа поне една малка буква, една главна буква, една цифра и да е дълга поне 8 знака!";
							header("Location: ../RegisterForm/RegistrationForm.php");
						}
					}
				
			}
			else
			{
				$_SESSION["error"] = "Невалиден код за достъп.";
				header("Location: ../RegisterForm/RegistrationForm.php");
			}
		}

?>