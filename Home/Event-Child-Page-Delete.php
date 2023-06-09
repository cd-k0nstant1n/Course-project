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
  $sqlDelete = "DELETE FROM events WHERE id = " . $eventId;
  $resultDelete = mysqli_query($connection, $sqlDelete);

  if ($resultDelete) {
    // Get the maximum ID from the remaining rows
    $sqlMaxId = "SELECT MAX(id) FROM events";
    $resultMaxId = mysqli_query($connection, $sqlMaxId);
    $maxId = mysqli_fetch_row($resultMaxId)[0];

    // Set the auto-increment value to the maximum ID + 1
    $sqlResetAutoIncrement = "ALTER TABLE events AUTO_INCREMENT = " . ($maxId + 1);
    $resultResetAutoIncrement = mysqli_query($connection, $sqlResetAutoIncrement);

    if ($resultResetAutoIncrement) {
      echo '<script>alert("Row deleted successfully.");</script>';
      echo '<script>window.opener.updateFirstPage();</script>';
      echo '<script>window.close();</script>';
    } else {
      echo '<script>alert("Failed to reset auto-increment: ' . mysqli_error($connection) . '");</script>';
    }
  } else {
    echo '<script>alert("Failed to delete row: ' . mysqli_error($connection) . '");</script>';
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