<?php
	session_start();
	session_destroy();
?>

<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login_style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <title>Влизане</title>

</head>
<body>


    <div class="container">
    
        <div class="top">
            <header>Влизане</header>
            <br>
            
			<form method="POST" action="check_login.php">
            <div class="input-field">
                <input type="email" class="input" name="mail" placeholder="Имейл" id="" required>
                <i class='bx bx-user'></i>
            </div>

            <div class="input-field">
                <input type="Password" class="input" name="password" placeholder="Парола" id="" required>
                <i class='bx bx-lock-alt'></i>
            </div>
               
            <div class="input-field">
                <input type="submit" class="submit" value="Login" id="">
            </div>

            <div class="two-col">

                <div class="remember-me">
                    <input type="checkbox" name="" id="check">
                    <label for="check">Запомни ме</label>
                </div>

                <div class="forgotten-password">
                    <label><a href="ForgottenPassword.html">Забравена парола?</a></label>
                </div>

                <div class="signup_link">
                    <a href="../RegisterForm/RegistrationForm.html">Нямаш акаунт?</a>
                </div>

            </div>
			</form>
        </div>

    </div>
</body>
    