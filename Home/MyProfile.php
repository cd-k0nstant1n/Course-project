<!DOCTYPE html>
<html lang="bg">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Home.css">
  <link rel="stylesheet" href="MyProfile.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Document</title>
</head>
<body>
	
    <?php	include 'header.php';  ?>

	<main>
<div class="container-form">
<div class="user-details">

<h3>Моят Профил:</h3>
<div class="input-box">
    <span class="details">Първо име</span>
    <input type="text" id="yes" name="first_name" placeholder="Въведете първо име" required>
  </div>

  <div class="input-box">
    <span class="details">Фамилия</span>
    <input type="text" id="yes" name="family_name" placeholder="Въведете фамилия" required>
  </div>
<br>
  <div class="input-box">
    <span class="details">Клас</span>
    <input type="text" name = "class" placeholder="Въведете клас" required>
  </div>

  <div class="input-box">
    <span class="details">Номер в клас </span>
    <input type="number" name = "class_number" placeholder="Въведете номер в клас" required>
  </div>

  <div class="input-box">
    <span class="details">Имейл</span>
    <input type="email" name = "mail" placeholder="Въведете имейл" required>
  </div>

  <div class="input-box">
    <span class="details">Телефонен номер</span>
    <input type="tel" name = "phone" placeholder="Въведете телефон" required>
  </div>


<div class="container-form2">
<div class="user-details">

<h3>Промяна на паролата:</h3>

<div class="input-box" >
    <span class="details">Настояща парола</span>
    <input type="password"name="password" placeholder="Настояща парола" required>
  </div>

  <div class="input-box" >
    <span class="details">Нова парола</span>
    <input type="password" name = "password" placeholder="Въведете паролата" name="pass" id="pass1" onkeyup="validate()" required>
    <span id="error" style="color:red" class="error_pass"></span>
  </div>

  <div class="input-box" >
    <span class="details">Потвърждение на парола</span>
    <input type="password" placeholder="Потвърдете парола" name="pass" id="pass2" onkeyup="validate()" required>
  </div>
</div>

  <div class="button">
    <input type="submit" value="Запазване">
  </div>
</div>
</main>

<?php include 'footer.php'  ?>

<script src="../scripts.js"></script>
</body>
</html>

