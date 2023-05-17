<!DOCTYPE html>
<html lang="bg">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Home.css">
	<link rel="stylesheet" href="Journal.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Дневник</title>
</head>
<body>
	<?php include 'header.php'  ?>

	<main>
	<div class="filter">

	</div>
		<?php
			if(isset($_SESSION['mail']))
			{
				switch ($_SESSION['role'])
				{
					case "student":
						$sql = 'SELECT * FROM students WHERE mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						
						echo '<div class="table-container">';
						echo '<table>';
						echo '<tr> <th> Номер </th> <th> Предмет </th> <th> Оценки </th>  <th> Отсъствия </th> </tr>';
						echo '<tr> <td>1</td> <td> Английски език </td> <td>' . $row['English'] . '</td> <td>' . $row['Absences_english'] . '</td> </tr>';
						echo '<tr> <td>2</td> <td> Математика </td> <td>' . $row['Math'] . '</td> <td>' . $row['Absences_math'] . '</td> </tr>';
						echo '<tr> <td>3</td> <td> Български език </td> <td>' . $row['Bulgarian'] . '</td> <td>' . $row['Absences_bulgarian'] . '</td> </tr>';
						echo '<tr> <td>4</td> <td> ООП </td> <td>' . $row['Programming'] . '</td> <td>' . $row['Absences_programming'] . '</td> </tr>';
						echo '<tr> <td>5</td> <td> Бази данни </td> <td></td> <td></td>';
						echo '<tr> <td>6</td> <td> Разработка на софтуер </td> <td></td> <td></td>';
						echo '<tr> <td>7</td> <td> Web програмиране </td> <td></td> <td></td>';
						echo '<tr> <td>8</td> <td> Вградени системи </td> <td></td> <td></td>';
						echo '<tr> <td>9</td> <td> МОП </td> <td></td> <td></td>';
						echo '<tr> <td>5</td> <td> Физическо върпитание и спорт </td> <td>' . $row['Physical Education(PE)'] . '</td> <td>' . $row['Absences_pe'] . '</td> </tr>';
						echo '<tr> <td>6</td> <td> Музика </td> <td>' . $row['Music'] . '</td> <td>' . $row['Absences_music'] . '</td> </tr>';
						echo '</table>';
						echo '</div>';
						break;
						
					case "parent":
						$sql = 'SELECT English, Math, Bulgarian, Programming, `Physical Education(PE)`, Music FROM students JOIN parents ON class_number=student_class_number WHERE parents.mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						
						echo '<table>';
						echo '<tr> <td> Номер </td> <th> Предмет </th> <th> Оценки </th>  <th> Отсъствия </th> </tr>';
						echo '<tr> <td></td> <td> Английски език </td> <td>' . $row['English'] . '</td> </tr>';
						echo '<tr> <td></td> <td> Математика </td> <td>' . $row['Math'] . '</td> </tr>';
						echo '<tr> <td></td> <td> Български език </td> <td>' . $row['Bulgarian'] . '</td> </tr>';
						echo '<tr> <td></td> <td> Програмиране </td> <td>' . $row['Programming'] . '</td> </tr>';
						echo '<tr> <td></td> <td> Физическо върпитание и спорт </td> <td>' . $row['Physical Education(PE)'] . '</td> </tr>';
						echo '<tr> <td></td> <td> Музика </td> <td>' . $row['Music'] . '</td> </tr>';
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
						echo '<table >';
						echo '<tr> <th> Номер </th> <th> Ученик </th> <th> Оценки </th> <th> Оценяване </th> </tr>';
						$num = mysqli_num_rows($result);
						$index = 1;
						
						while($num > 0)
						{
							$num--;
							$row = $result->fetch_assoc();
							echo '<tr> <td>' . $index . '</td> <td>' . $row['name'] . ' ' . $row['family_name'] . '</td>' . '<td>' . $row[$subject] . '</td> <td> <a class="add-grade" href="add_grade.php?name=2&row=' . $index . '">2</a><a class="add-grade" href="add_grade.php?name=3&row=' . $index . '">3</a><a class="add-grade" href="add_grade.php?name=4&row=' . $index . '">4</a><a class="add-grade" href="add_grade.php?name=5&row=' . $index . '">5</a><a class="add-grade" href="add_grade.php?name=6&row=' . $index . '">6</a></td> </tr>';
							$index++;
						}
						
						echo '</table>';
						break;
						
					default: break;
				}
			}
		?>
	</main>

    <?php include 'footer.php'  ?>

	<script src="../scripts.js"></script>
</body>	
</html>