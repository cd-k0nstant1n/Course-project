<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Delete-Grade-Page.css">
  <title>Добави ред</title>
</head>
<body>
  <div class="container">
	<?php echo '<form method="POST" action="delete_grade.php?subject=' . $_GET['subject'] . '&mail=' . $_GET['mail'] . '&grade=' . $_GET['grade'] . '">';?>
      <div class="input-info">
        <span class="details">Наистина ли искате да изтриете оценката?</span>
      </div>
      <!--<button class="button" onclick="window.location.href='Home.php'">ДА</button>-->
	  <input type="submit" class="submit" value="Да" id="">
	  <button class="button" onclick="CloseWindow()">НЕ</button>
    </form>
  </div>

  <script>
    function CloseWindow()
	{
      const myWindow = window.close();
	}
		
	function updateFirstPage()
	{
		window.opener.updateFirstPage();
	}
		
	
  </script>

</body>
</html>