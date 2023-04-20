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
	<header>
		<div class="navbar">
			<a href="Home.php"><img src="../images/Project-Logo-2.png" class="logo"></a>
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
			
				if(!isset($_SESSION['mail']))
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a>';
				}
				else
				{
					echo '<div class="profile-box">
					<button class="profile-btn">Профил</button>
					<ul class="profile-dropdown">
					<div class="sub-menu">
					  <li><a href="MyProfile.php" class="sub-menu-link">
						     <img src="../images/profile.png">
								 <p>Моят Профил</p>
								 <span>></span>
						</li></a>	

					  <li><a href="#" class="sub-menu-link">
						<img src="../images/setting.png">
						<p>Настройки</p>
						<span>></span>
			      </a></li>

						<li><a href="../Forms/LoginForm/Login_form.php" class="sub-menu-link">
						     <img src="../images/logout.png">
								 <p>Изход</p>
								 <span>></span>
						</li></a>						
				  </ul>
				  </ul>
					';
				}
			?>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown_menu">
			<li><a href="Home.php">Начало</a></li>
			<li><a href="Journal.php">Дневник</a></li>
			<li><a href="#">Програма</a></li>
			<li><a href="#">Отзиви</a></li>
			<li><a href="#">Събития</a></li>
			<li><a href="#">За нас</a></li>
			<li>
			<?php
				session_start();
			
				if(!isset($_SESSION['mail']))
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a>';
				}
				else
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Излез</a>';
				}
			?>
			</li>
		</div>
	</header>

	<main>
		
	</main>

	<footer class="footer">
		<div class="container">
			<p class="text-muted">Copyright &copy; 2023 e-dnevnik. All rights reserved.</p>
		</div>
	</footer>

	<script src="../scripts.js"></script>
</body>	
</html>