<?php
	session_start();
?> 

<!DOCTYPE html>
<html lang="bg">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="RegistrationForm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>Регистрация</title>
  </head>
<body>
  <div class="container">

    <div class="title">Създаване на акаунт</div>

      <div class="content">

        <form method="POST" action="Registrated.php" onsubmit="return validate()">

          <div class="chose-role">
            <input type="radio" onclick="javascript:roleCheck()" name="role" value="student" id="dot-1" required>
            <input type="radio" onclick="javascript:roleCheck()" name="role" value="teacher" id="dot-2">
            <input type="radio" onclick="javascript:roleCheck()" name="role" value="parent" id="dot-3">

            <div class="category">

              <label for="dot-1">
                <span class="dot one"></span>
                <span class="role">Ученик</span>
              </label>

              <label for="dot-2">
                <span class="dot two"></span>
                <span class="role">Учител</span>
			        </label>

              <label for="dot-3">
                <span class="dot three"></span>
                <span class="role">Родител</span>
              </label>

            </div>

          </div>

        <div id="Form">

        </div>
        <?php
	if(isset($_SESSION["error"])) {echo '<p style="text-align:center; color:red">' . $_SESSION["error"] . '</p>';}
?> 
        <div class="button">
          <input type="submit" value="Регистриране">
        </div>

      </form>

      <div class="logInButton">
        <a href="../LoginForm/Login_form.php">Вече имаш акаунт?</a>
      </div>

    </div>
    
  </div>

  <?php
	session_destroy();
?> 
  <script src="../../scripts.js"></script>
</body>
</html>