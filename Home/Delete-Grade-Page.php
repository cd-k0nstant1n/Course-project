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
      <div class="input-info">
        <span class="details">Найстина ли искате да изтриете оценката?</span>
      </div>
      <button class="button">ДА</button><button class="button" onclick="CloseWindow()">НЕ</button>
    </form>
  </div>

  <script>
    function CloseWindow(){
      const myWindow = window.close();
		}
		
		function updateFirstPage() {
			location.reload();
		}
  </script>

</body>
</html>