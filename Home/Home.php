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
					$sql = 'SELECT * FROM students WHERE mail="' . $_SESSION['mail'] . '";';
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();

					echo '	<div class="your-place">
						  		<p>Твоето класиране във випуска:</p>
			          	  		<h1 class="big-num">1</h1>
			          	  		<p>' . $row['name'] . '</p>
						  		<p> №' . $row['class_number'] .' - '. $row['class'] .'</p>
			          	  	</div>
						  	<div class="avg-grade">
						  		<p>Средноаритметично на твоите оценки:</p> 
						  		<h1 class="big-num">2</h1>
						  	</div>';
			  		break;

				case 'parent':
					$sql = 'SELECT * FROM parents JOIN students ON student_class_number=class_number WHERE parents.mail="' . $_SESSION['mail'] . '";';
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();

			  		echo '<div class="your-place">
					      <p>Kласиране на сина/дъщеря ви във випуска:</p>
			  			  <h1 class="big-num">1</h1>
			  	          <p>' . $row['name'] . '</p>
						  <p> №' . $row['class_number'] .' - '. $row['class'] .'</p>
			  			  </div>
							<div class="avg-grade">
							<p>Средноаритметично на оценките на сина/дъщеря ви:</p> 
							<h1 class="big-num">2</h1>
						  </div>';

					break;

				case 'admin':
					//button for generating code

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

