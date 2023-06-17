<!DOCTYPE html>
<html lang="bg">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Начало</title>
</head>
<body>
	
    <?php	include 'header.php';  ?>

	<main> 
		<?php 
		
		if (!isset($_SESSION['mail'])){
			include 'sliding_cards.php'; 

			echo "<p>Please login to access all the content!</p>";
		}else{

			include 'sliding_cards.php'; 

			echo '<div class="main-down">';
			switch ($_SESSION['role']){

				case 'student':
					//--------------------------------------------------
					$sql = "SELECT class FROM students WHERE mail='" . $_SESSION['mail'] . "';";
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					$student_class = $row['class'];
					$sql = "SELECT * FROM students WHERE class='" . $student_class . "';";
					$result = mysqli_query($connection, $sql);
					$avarage = range(1, mysqli_num_rows($result));
					$mails = range(1, mysqli_num_rows($result));
					
					for($i = 0; $i < mysqli_num_rows($result); $i++)
					{
						$num_of_grades = 0;
						$row = $result->fetch_assoc();
						$mails[$i] = $row['mail'];
						$digits = str_split(strval($row['English']));
						$english = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$english = $english + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$english = $english/sizeof($digits);
						
						$digits = str_split(strval($row['Math']));
						$math = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$math = $math + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$math = $math/sizeof($digits);
						
						$digits = str_split(strval($row['Bulgarian']));
						$bulgarian = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$bulgarian = $bulgarian + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$bulgarian = $bulgarian/sizeof($digits);
						
						$digits = str_split(strval($row['Programming']));
						$programming = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$programming = $programming + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$programming = $programming/sizeof($digits);
						
						$digits = str_split(strval($row['Physical_Education']));
						$pe = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$pe = $pe + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$pe = $pe/sizeof($digits);
						
						$digits = str_split(strval($row['Music']));
						$music = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$music = $music + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$music = $music/sizeof($digits);
						
						$digits = str_split(strval($row['Data_bases']));
						$databases = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$databases = $databases + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$databases = $databases/sizeof($digits);
						
						$digits = str_split(strval($row['Software']));
						$software = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$software = $software + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$software = $software/sizeof($digits);
						
						$digits = str_split(strval($row['Web']));
						$web = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$web = $web + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$web = $web/sizeof($digits);
						
						$digits = str_split(strval($row['Systems']));
						$systems = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$systems = $systems + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$systems = $systems/sizeof($digits);

						$digits = str_split(strval($row['Mop']));
						$mop = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$mop = $mop + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$mop = $mop/sizeof($digits);
						
						if($num_of_grades > 0) {$avarage[$i] = ($english + $math + $bulgarian + $programming + $pe + $music + $databases + $software + $web + $systems + $mop)/$num_of_grades;}
						if($num_of_grades == 0) {$avarage[$i] = 0;}
					}
					
					$best = array(-1, sizeof($avarage));
					$best_mails = array();
					
					for ($i = 0; $i < sizeof($avarage); $i++)
					{
						$best_mails[] = "";
					}
					
					$biggest_i = 0;
					
					for($j = 0; $j < sizeof($avarage); $j++)
					{
						for($i = 0; $i < sizeof($avarage); $i++)
						{
							if($avarage[$i] > $avarage[$biggest_i])
							{
								$biggest_i = $i;
							}
						}
						
						$best[$j] = $avarage[$biggest_i];
						$avarage[$biggest_i] = -1;
						$best_mails[$j] = $mails[$biggest_i];
						$biggest_i = 0;
					}
					
					for($i = 0; $i < sizeof($best); $i++)
					{
						if($best_mails[$i] == $_SESSION['mail'])
						{
							$number_in_class = $i + 1;
							$avarage_student_score = $best[$i];
							break;
						}
					}
					//--------------------------------------------------
					$sql = 'SELECT * FROM students WHERE mail="' . $_SESSION['mail'] . '";';
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();

					echo '	<div class="your-place">
						  		<p>Твоето класиране в класа:</p>
			          	  		<h1 class="big-num">' . $number_in_class . '</h1>
			          	  		<p>' . $row['name'] . '</p>
						  		<p> №' . $row['class_number'] .' - '. $row['class'] .'</p>
			          	  	</div>
						  	<div class="avg-grade">
						  		<p>Средноаритметично на твоите оценки:</p> 
						  		<h1 class="big-num">' . number_format((float)$avarage_student_score, 2, '.', '') . '</h1>
						  	</div>';
			  		break;

				case 'parent':
					//--------------------------------------------------
					$sql = "SELECT student_class FROM parents WHERE mail='" . $_SESSION['mail'] . "';";
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					$student_class = $row['student_class'];
					$sql = "SELECT * FROM students WHERE class='" . $student_class . "';";
					$result = mysqli_query($connection, $sql);
					$avarage = range(1, mysqli_num_rows($result));
					$mails = range(1, mysqli_num_rows($result));
					
					for($i = 0; $i < mysqli_num_rows($result); $i++)
					{
						$num_of_grades = 0;
						$row = $result->fetch_assoc();
						$mails[$i] = $row['mail'];
						$digits = str_split(strval($row['English']));
						$english = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$english = $english + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$english = $english/sizeof($digits);
						
						$digits = str_split(strval($row['Math']));
						$math = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$math = $math + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$math = $math/sizeof($digits);
						
						$digits = str_split(strval($row['Bulgarian']));
						$bulgarian = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$bulgarian = $bulgarian + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$bulgarian = $bulgarian/sizeof($digits);
						
						$digits = str_split(strval($row['Programming']));
						$programming = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$programming = $programming + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$programming = $programming/sizeof($digits);
						
						$digits = str_split(strval($row['Physical_Education']));
						$pe = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$pe = $pe + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$pe = $pe/sizeof($digits);
						
						$digits = str_split(strval($row['Music']));
						$music = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$music = $music + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$music = $music/sizeof($digits);
						
						$digits = str_split(strval($row['Data_bases']));
						$databases = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$databases = $databases + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$databases = $databases/sizeof($digits);
						
						$digits = str_split(strval($row['Software']));
						$software = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$software = $software + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$software = $software/sizeof($digits);
						
						$digits = str_split(strval($row['Web']));
						$web = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$web = $web + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$web = $web/sizeof($digits);
						
						$digits = str_split(strval($row['Systems']));
						$systems = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$systems = $systems + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$systems = $systems/sizeof($digits);

						$digits = str_split(strval($row['Mop']));
						$mop = 0;
						
						for($j = 0; $j < sizeof($digits); $j++)
						{
							$mop = $mop + (int)$digits[$j];
							if((int)$digits[$j] != 0) {$num_of_grades = $num_of_grades + 1;}
						}
						
						//$mop = $mop/sizeof($digits);
						
						if($num_of_grades > 0) {$avarage[$i] = ($english + $math + $bulgarian + $programming + $pe + $music + $databases + $software + $web + $systems + $mop)/$num_of_grades;}
						if($num_of_grades == 0) {$avarage[$i] = 0;}
					}
					
					$best = array(-1, sizeof($avarage));
					$best_mails = array();
					
					for ($i = 0; $i < sizeof($avarage); $i++)
					{
						$best_mails[] = "";
					}
					
					$biggest_i = 0;
					
					for($j = 0; $j < sizeof($avarage); $j++)
					{
						for($i = 0; $i < sizeof($avarage); $i++)
						{
							if($avarage[$i] > $avarage[$biggest_i])
							{
								$biggest_i = $i;
							}
						}
						
						$best[$j] = $avarage[$biggest_i];
						$avarage[$biggest_i] = -1;
						$best_mails[$j] = $mails[$biggest_i];
						$biggest_i = 0;
					}
					
					$sql = "SELECT * FROM parents WHERE mail='" . $_SESSION['mail'] . "';";
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					$sql = "SELECT mail FROM students WHERE class='" . $row['student_class'] . "' AND class_number='" . $row['student_class_number'] . "';";
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					$student_mail = $row['mail'];
					
					for($i = 0; $i < sizeof($best); $i++)
					{
						if($best_mails[$i] == $student_mail)
						{
							$number_in_class = $i + 1;
							$avarage_student_score = $best[$i];
							break;
						}
					}
					//--------------------------------------------------
				
					$sql = 'SELECT * FROM parents JOIN students ON student_class_number=class_number WHERE parents.mail="' . $_SESSION['mail'] . '";';
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();

			  		echo '<div class="your-place">
					      <p>Kласиране на сина/дъщеря ви в класа:</p>
			  			  <h1 class="big-num">' . $number_in_class . '</h1>
			  	          <p>' . $row['name'] . '</p>
						  <p> №' . $row['class_number'] .' - '. $row['class'] .'</p>
			  			  </div>
							<div class="avg-grade">
							<p>Средноаритметично на оценките на сина/дъщеря ви:</p> 
							<h1 class="big-num">' . number_format((float)$avarage_student_score, 2, '.', '') . '</h1>
						  </div>';

					break;

				case 'admin':
					//button for generating code
					$sql = 'SELECT * FROM code';
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					echo '<h2>' . $row['Code'] . '<h2>';
					echo '<button type="button" class="generate-code"><a href="generate_code.php">Генериране на код</a></button>';
				break;
		
			}
		}
		
		?>

        </div> 
	</main>

	<?php include 'footer.php'  ?>

	<script src="../scripts.js"></script>
</body>	
</html>

