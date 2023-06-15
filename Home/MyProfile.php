<!DOCTYPE html>
<html lang="bg">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Home.css">
  <link rel="stylesheet" href="MyProfile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Моят Профил</title>
</head>
<body>
	
    <?php	include 'header.php';  ?>

	<main>
<div class="container-form">
<div class="user-details">

<?php
	//session_start();
	include 'db_connection.php';
	$connection = getDbConnection();
	$sql = "SELECT name, family_name, class, class_number, mail, phone FROM students WHERE mail = '" . $_SESSION['mail'] . "';";
	$result = mysqli_query($connection, $sql);
	
	if(mysqli_num_rows($result) == 0)
	{
		$sql = "SELECT name, family, student_class, student_class_number, mail, phone FROM parents WHERE mail = '" . $_SESSION['mail'] . "';";
		$result = mysqli_query($connection, $sql);
		
		if(mysqli_num_rows($result) == 0)
		{
			$sql = "SELECT name, family_name, mail, phone FROM teachers WHERE mail = '" . $_SESSION['mail'] . "';";
			$result = mysqli_query($connection, $sql);
			$row = $result->fetch_assoc();
			$name = $row['name'];
			$last_name = $row['family_name'];
			$mail = $row['mail'];
			$phone = $row['phone'];
			$class = "";
			$class_number = "";
		}
		else
		{
			$row = $result->fetch_assoc();
			$name = $row['name'];
			$last_name = $row['family'];
			$class = $row['student_class'];
			$class_number = $row['student_class_number'];
			$mail = $row['mail'];
			$phone = $row['phone'];
		}
	}
	else
	{
		$row = $result->fetch_assoc();
		$name = $row['name'];
		$last_name = $row['family_name'];
		$class = $row['class'];
		$class_number = $row['class_number'];
		$mail = $row['mail'];
		$phone = $row['phone'];
	}
?>

<h3>Моят Профил:</h3>
<div class="input-box">
  <div class="user-details-else"></div>
    <span class="details">Първо име</span>
  <?php echo '<input type="text" id="yes" name="first_name" placeholder="Въведете първо име" value="' . $name . '" readonly>'; ?>
  </div>

  <div class="input-box">
    <span class="details">Фамилия</span>
    <?php echo '<input type="text" id="yes" name="family_name"  value="' . $last_name . '"readonly>'?>
  </div>
  
  <div class="input-box">
    <span class="details">Клас</span>
    <?php echo '<input type="text" name = "class"  value="' . $class . '"readonly>'?>
  </div>

  <div class="input-box">
    <span class="details">Номер в клас </span>
    <?php echo '<input type="number" name = "class_number" value="' . $class_number . '"readonly>'?>
  </div>

  <div class="input-box">
    <span class="details">Имейл</span>
    <?php echo '<input type="email" name = "mail" placeholder="Въведете имейл" value="' . $mail . '"readonly>'?>
  </div>

  <div class="input-box">
    <span class="details">Телефонен номер</span>
    <?php echo '<input type="tel" name = "phone" placeholder="Въведете телефон" value="' . $phone . '"readonly>'?>
  </div>
  <hr>
  <h3>Промяна на паролата:</h3>
 
<form class="user-details" method="POST" action="reset_password.php">
<div class="input-box" >
    <span class="details">Настояща парола</span>
    <input type="password"name="current_password" placeholder="Настояща парола" required>
  </div>

  <div class="input-box" >
    <span class="details">Парола</span>
    <input type="password" name = "new_password" placeholder="Въведете нова парола" name="pass" id="pass1" onkeyup="validate()" required>
    <span id="error" style="color:red" class="error_pass"></span>
  </div>

  <div class="input-box-center" >
    <span class="details">Потвърждение на парола</span>
    <input type="password" placeholder="Потвърдете парола" name="pass" id="pass2" onkeyup="validate()" required>
  </div>
  </div>

<div class="button">
    <input type="submit" value="Запазване">
</div>
	</form>
  
</div>
</main>

<?php include 'footer.php'  ?>

<script src="../scripts.js"></script>
</body>
</html>