<!DOCTYPE html>
<html lang="bg">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Дневник</title>
</head>
<body>
	<header>
		<div class="navbar">
			<div class="logo"><a href="#">e-dnevnikbg</a></div>
			<ul class="links">
				<li><a href="Home.php">Начало</a></li>
				<li><a href="Journal.php">Дневник</a></li>
				<li><a href="#">Програма</a></li>
				<li><a href="#">Отзиви</a></li>
				<li><a href="#">Събития</a></li>
				<li><a href="#">За нас</a></li>
			</ul>
			<?php
				session_start();
			
				if (!isset($_SESSION['mail']))
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a>';
				}
				else
				{
					echo '<div class="profile-box">
					<button class="profile-btn">Профил</button>
					<ul class="profile-dropdown">
					  <li><a href="#">Моят профил</a></li>
					  <li><a href="../Forms/LoginForm/Login_form.php">Излез</a></li>
					</ul>
				  </div>';
				}
			?>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown_menu">
			<li><a href="Home.php">Начало</a></li>
			<li><a href="#">Дневник</a></li>
			<li><a href="#">Програма</a></li>
			<li><a href="#">Отзиви</a></li>
			<li><a href="#">Събития</a></li>
			<li><a href="#">За нас</a></li>
			<li><a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a></li>
		</div>
	</header>

	<main>
		<?php
			include 'db_connection.php';
			$connection = getDbConnection();
			
			if(isset($_SESSION['mail']))
			{
				switch ($_SESSION['role'])
				{
					case "student":
						$sql = 'SELECT English, Math, Bulgarian, Programming, `Physical Education(PE)`, Music FROM students WHERE mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
					
						echo '<table border=1>';
						echo '<tr> <th> Subject </th> <th> Grades </th> </tr>';
						echo '<tr> <td> English </td> <td>' . $row['English'] . '</td></tr>';
						echo '<tr> <td> Math </td> <td>' . $row['Math'] . '</td></tr>';
						echo '<tr> <td> Bulgarian </td> <td>' . $row['Bulgarian'] . '</td></tr>';
						echo '<tr> <td> Programming </td> <td>' . $row['Programming'] . '</td></tr>';
						echo '<tr> <td> PE </td> <td>' . $row['Physical Education(PE)'] . '</td></tr>';
						echo '<tr> <td> Music </td> <td>' . $row['Music'] . '</td></tr>';
						echo '</table>';
						break;
						
					case "parent":
						$sql = 'SELECT English, Math, Bulgarian, Programming, `Physical Education(PE)`, Music FROM students JOIN parents ON class_number=student_class_number WHERE parents.mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						
						echo '<table border=1>';
						echo '<tr> <th> Предмет </th> <th> Оценки </th> </tr>';
						echo '<tr> <td> Английски език </td> <td>' . $row['English'] . '</td></tr>';
						echo '<tr> <td> Математика </td> <td>' . $row['Math'] . '</td></tr>';
						echo '<tr> <td> България </td> <td>' . $row['Bulgarian'] . '</td></tr>';
						echo '<tr> <td> Програмиране </td> <td>' . $row['Programming'] . '</td></tr>';
						echo '<tr> <td> Физическо върпитание и спорт </td> <td>' . $row['Physical Education(PE)'] . '</td></tr>';
						echo '<tr> <td> Музика </td> <td>' . $row['Music'] . '</td></tr>';
						echo '</table>';
						break;
						
					case "teacher":
						//$sql = 'SELECT "teachers.subject" FROM students JOIN teachers ON "teachers.subject"=subject WHERE teachers.mail="' . $_SESSION['mail'] . '";';
						//$sql = 'SELECT students.name, students.family_name, teachers.subject FROM students JOIN teachers ON "teachers.subject"=subject WHERE teachers.mail="' . $_SESSION['mail'] . '" AND subjects.teachers.subject=' . $_SESSION['mail'] . ';';
						$sql = 'SELECT subject FROM teachers WHERE mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						$sql = 'SELECT students.name, students.family_name, students.class, students.' . $row['subject'] . ' FROM students JOIN subjects ON students.class = subjects.class JOIN teachers ON subjects.' . $row['subject'] . ' = teachers.mail WHERE teachers.mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$subject = $row['subject'];
						echo '<table border=1>';
						echo '<tr> <th> Student </th> <th> Grades </th> </tr>';
						$num = mysqli_num_rows($result);
						
						while($num > 0)
						{
							$num--;
							$row = $result->fetch_assoc();
							echo '<tr> <td>' . $row['name'] . $row['family_name'] . '</td>' . '<td>' . $row[$subject] . '</td> </tr>';
						}
						
						echo '</table>';
						break;
						
					default: break;
				}
			}
		?>
	</main>

	<footer class="footer">
		<div class="container">
			<p class="text-muted">Copyright &copy; 2023 e-dnevnik. All rights reserved.</p>
		</div>
	</footer>

	<script src="../scripts.js"></script>
</body>	
</html>