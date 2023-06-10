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
			function add_grades($number)
			{
				$digits = str_split(strval($number));

				foreach ($digits as $digit)
				{
					echo '<a class="add-grade">' . $digit . '</a>';
				}
			}
		
//<<<<<<< HEAD
			function print_grades($number)
			{
				$digits = str_split(strval($number));
				echo $digits[0];
				/*foreach ($digits as $digit)
				{
					echo $digit . ',';
				}*/
				
				for($i = 1; $i < sizeof($digits); $i++)
				{
					echo ', ' . $digits[$i];
				}
			}
		
//=======
//>>>>>>> 856d563bb724700c97a557cfe46b1efd5cbf60bf
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
						echo '<tr> <td>1</td> <td> Английски език </td> <td>';
						print_grades($row['English']);
						echo '</td> <td>' . $row['English_absences'] . '</td> </tr>';
						echo '<tr> <td>2</td> <td> Математика </td> <td>';
						print_grades($row['Math']);
						echo '</td> <td>' . $row['Math_absences'] . '</td> </tr>';
						echo '<tr> <td>3</td> <td> Български език </td> <td>';
						echo print_grades($row['Bulgarian']);
						echo '</td> <td>' . $row['Bulgarian_absences'] . '</td> </tr>';
						echo '<tr> <td>4</td> <td> ООП </td> <td>';
						print_grades($row['Programming']);
						echo '</td> <td>' . $row['Programming_absences'] . '</td> </tr>';
						echo '<tr> <td>5</td> <td> Бази данни </td> <td>';
						print_grades($row['Data_bases']);
						echo '</td> <td>' . $row['Data_bases_absences'] . '</td>';
						echo '<tr> <td>6</td> <td> Разработка на софтуер </td> <td>';
						print_grades($row['Software']);
						echo '</td> <td>' . $row['Software_absences'] . '</td>';
						echo '<tr> <td>7</td> <td> Web програмиране </td> <td>';
						print_grades($row['Web']);
						echo '</td> <td>' . $row['Web_absences'] . '</td>';
						echo '<tr> <td>8</td> <td> Вградени системи </td> <td>';
						print_grades($row['Systems']);
						echo '</td> <td>' . $row['Systems_absences'] . '</td>';
						echo '<tr> <td>9</td> <td> МОП </td> <td>';
						print_grades($row['Mop']);
						echo '</td> <td>' . $row['Mop_absences'] . '</td>';
						echo '<tr> <td>5</td> <td> Физическо върпитание и спорт </td> <td>';
						print_grades($row['Physical_Education']);
						echo '</td> <td>' . $row['Physical_Education_absences'] . '</td> </tr>';
						echo '<tr> <td>6</td> <td> Музика </td> <td>';
						print_grades($row['Music']);
						echo '</td> <td>' . $row['Music_absences'] . '</td> </tr>';
						echo '</table>';
						echo '</div>';
						break;
						
					case "parent":
						$sql = 'SELECT * FROM students JOIN parents ON class_number=student_class_number WHERE parents.mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						
						echo '<div class="table-container">';
						echo '<table>';
						echo '<tr> <th> Номер </th> <th> Предмет </th> <th> Оценки </th>  <th> Отсъствия </th> </tr>';
						echo '<tr> <td>1</td> <td> Английски език </td> <td>';
						print_grades($row['English']);
						echo '</td> <td>' . $row['English_absences'] . '</td> </tr>';
						echo '<tr> <td>2</td> <td> Математика </td> <td>';
						print_grades($row['Math']);
						echo '</td> <td>' . $row['Math_absences'] . '</td> </tr>';
						echo '<tr> <td>3</td> <td> Български език </td> <td>';
						echo print_grades($row['Bulgarian']);
						echo '</td> <td>' . $row['Bulgarian_absences'] . '</td> </tr>';
						echo '<tr> <td>4</td> <td> ООП </td> <td>';
						print_grades($row['Programming']);
						echo '</td> <td>' . $row['Programming_absences'] . '</td> </tr>';
						echo '<tr> <td>5</td> <td> Бази данни </td> <td>';
						print_grades($row['Data_bases']);
						echo '</td> <td>' . $row['Data_bases_absences'] . '</td>';
						echo '<tr> <td>6</td> <td> Разработка на софтуер </td> <td>';
						print_grades($row['Software']);
						echo '</td> <td>' . $row['Software_absences'] . '</td>';
						echo '<tr> <td>7</td> <td> Web програмиране </td> <td>';
						print_grades($row['Web']);
						echo '</td> <td>' . $row['Web_absences'] . '</td>';
						echo '<tr> <td>8</td> <td> Вградени системи </td> <td>';
						print_grades($row['Systems']);
						echo '</td> <td>' . $row['Systems_absences'] . '</td>';
						echo '<tr> <td>9</td> <td> МОП </td> <td>';
						print_grades($row['Mop']);
						echo '</td> <td>' . $row['Mop_absences'] . '</td>';
						echo '<tr> <td>5</td> <td> Физическо върпитание и спорт </td> <td>';
						print_grades($row['Physical_Education']);
						echo '</td> <td>' . $row['Physical_Education_absences'] . '</td> </tr>';
						echo '<tr> <td>6</td> <td> Музика </td> <td>';
						print_grades($row['Music']);
						echo '</td> <td>' . $row['Music_absences'] . '</td> </tr>';
						echo '</table>';
						echo '</div>';
						break;
						
					case "teacher":
						//$sql = 'SELECT "teachers.subject" FROM students JOIN teachers ON "teachers.subject"=subject WHERE teachers.mail="' . $_SESSION['mail'] . '";';
						//$sql = 'SELECT students.name, students.family_name, teachers.subject FROM students JOIN teachers ON "teachers.subject"=subject WHERE teachers.mail="' . $_SESSION['mail'] . '" AND subjects.teachers.subject=' . $_SESSION['mail'] . ';';
						$sql = 'SELECT subject FROM teachers WHERE mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$row = $result->fetch_assoc();
						$sql = 'SELECT students.name, students.family_name, students.class, students.mail, students.' . $row['subject'] . ', students.' . $row['subject'] . "_absences" . ' FROM students JOIN subjects ON students.class = subjects.class JOIN teachers ON subjects.' . $row['subject'] . ' = teachers.mail WHERE teachers.mail="' . $_SESSION['mail'] . '";';
						$result = mysqli_query($connection, $sql);
						$subject = $row['subject'];
						echo '<table >';
						echo '<tr> <th> Номер </th> <th> Ученик </th> <th> Оценки </th> <th> Оценяване </th> <th>Отсъствия</th> <th>Добавяне и изтриване на отсъствия</th> </tr>';
						$num = mysqli_num_rows($result);
						$index = 1;
						
						while($num > 0)
						{
							$num--;
							$row = $result->fetch_assoc();
							echo '<tr> <td>' . $index . '</td> <td>' . $row['name'] . ' ' . $row['family_name'] . '</td>' . '<td>';
							add_grades($row[$subject]);
							echo '</td> <td> <a class="add-grade" href="add_grade.php?name=2&row=' . $index . '">2</a><a class="add-grade" href="add_grade.php?name=3&row=' . $index . '">3</a><a class="add-grade" href="add_grade.php?name=4&row=' . $index . '">4</a><a class="add-grade" href="add_grade.php?name=5&row=' . $index . '">5</a><a class="add-grade" href="add_grade.php?name=6&row=' . $index . '">6</a></td> <td>' . $row[$subject . "_absences"] . '</td> <td><a class="add-absence" href="add_absence.php?mail=' . $row['mail'] . '&subject=' . $subject . '">+</a> <a class="remove-absence" href="remove_absence.php?mail=' . $row['mail'] . '&subject=' . $subject . '">–</a></td></tr>';
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