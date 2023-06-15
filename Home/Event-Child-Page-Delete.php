<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Event-Child-Page-Delete.css">
  <title>Добави ред</title>
</head>
<?php
include 'db_connection.php';
$connection = getDbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form inputs
  $eventId = $_POST['id'];

  // Convert the value to an integer
  $eventId = intval($eventId);

  // Delete the row from the table
  $sql = "SELECT * FROM events";
  $result = mysqli_query($connection, $sql);
  /*$sqlDelete = "DELETE FROM events WHERE id = " . $eventId;
  $resultDelete = mysqli_query($connection, $sqlDelete);*/

  for($i = 1; $i <= mysqli_num_rows($result); $i++)
  {
	$row = $result->fetch_assoc();
	  
	if($i == $eventId)
	{
		$sql = "DELETE FROM events WHERE id=" . $row['id'];
		$result = mysqli_query($connection, $sql);
		echo '<script>window.opener.updateFirstPage();</script>';
		echo "<script>window.close();</script>";
	}
  }
}
?>
<body>
  <div class="container">
    <form method="post" action="">
      <div class="input-info">
        <span class="details">Номер на ред</span>
        <input type="text" name="id" placeholder="Въведи номер на събитието" required>
      </div>
      <button class="button">Изтрий ред</button>
    </form>
  </div>


</body>
</html>