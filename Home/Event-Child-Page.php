<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Event-Child-Page.css">
  <title>Добави ред</title>
</head>
<?php
	include 'db_connection.php';
	$connection = getDbConnection();

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  // Retrieve form inputs
	  $event = $_POST['event'];
	  $start = $_POST['event-start'];
	  $category = $_POST['category'];
	  $status = $_POST['status'];

	  // Add the new row to the table
	  $sql = "INSERT INTO events (Name, Beginning, Category, Status) VALUES ('" . $event . "', '" . $start . "', '" . $category . "', '" . $status . "');";
	  $result = mysqli_query($connection, $sql);
	  echo '<script>window.opener.updateFirstPage();</script>';
	  echo "<script>window.close();</script>";
	  /*echo '<tr>';
	  echo '<td>' . $event . '</td>';
	  echo '<td>' . $start . '</td>';
	  echo '<td>' . $category . '</td>';
	  echo '<td>' . $status . '</td>';
	  echo '</tr>';*/
	}
?>
<body>
  <div class="container">
  <form method="post" action="">
  <div class="input-info">
    <span class="details">Събитие</span>
    <input type="text" name="event" placeholder="Въведи ново събитие" required>
  </div>

  <div class="input-info">
    <span class="details">Начало</span>
    <input type="text" name="event-start" placeholder="Въведи начало" required>
  </div>

  <div class="input-info">
    <span class="details">Категория</span>
    <input type="text" name="category" placeholder="Въведи категория" required>
  </div>

  <div class="input-info">
    <span class="details">Статус</span>
    <input type="text" name="status" placeholder="Въведи Статус" required>
  </div>
  <button class="button" >Добави ред</button>
  </form>
</div>


</body>
</html>