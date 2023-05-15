<header>
		<div class="navbar">
			<img src="../images/Project-Logo-2.png" class="logo">
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
				include 'db_connection.php';
				$connection = getDbConnection();
				
				if (!isset($_SESSION['mail']))
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a>';
				}
				else
				{
					switch ($_SESSION['role'])
					{
						case "student":
							$sql = 'SELECT name FROM students WHERE mail="' . $_SESSION['mail'] . '";';
							break;
							
						case "parent":
							$sql = 'SELECT name FROM parents WHERE mail="' . $_SESSION['mail'] . '";';
							break;
							
						case "teacher":
							$sql = 'SELECT name FROM teachers WHERE mail="' . $_SESSION['mail'] . '";';
							break;
					}
					
					$result = mysqli_query($connection, $sql);
					$row = $result->fetch_assoc();
					echo '<div class="profile-box">
					<button class="profile-btn">' . $row['name'] . '</button>
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
			
				  </ul>';
				}
			?>
			<div class="toggle_btn">
				<i class="fa-solid fa-bars"></i>
			</div>
		</div>

		<div class="dropdown_menu">
			<ul>
			<li><a href="Home.php">Начало</a></li>
			<li><a href="Journal.php">Дневник</a></li>
			<li><a href="#">Програма</a></li>
			<li><a href="#">Отзиви</a></li>
			<li><a href="#">Събития</a></li>
			<li><a href="#">За нас</a></li>
			<li>
			<?php
			if (!isset($_SESSION['mail']))
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Влез</a>';
				}
			else
				{
					echo '<a href="../Forms/LoginForm/Login_form.php" class="action_btn">Излез</a>';
				}
			?>
			</li>
			</ul>
		</div>
	</header>