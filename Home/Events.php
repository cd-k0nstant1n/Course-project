<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Events.css">
	<link rel="stylesheet" href="Home.css">
	<title>Събития</title>
</head>
<body>

	<?php	include 'header.php';  ?>

<div class="container-table">
	<?php
		if(isset($_SESSION['mail']))
		{
			if($_SESSION['role'] == "teacher" || $_SESSION['role'] == "admin")
			{
				echo '<button class="delete_button" onclick="deleteFunction()">Изтрий ред</button>';
				echo '<button class="add_button" onclick="addFunction()">Добави ред</button>';
			}
		}
	?>
	<table id="мyTable">
		<thead>
			<tr>
				<th>Номер</th>
				<th>Събитиe</th>
				<th>Начало</th>
				<th>Категория</th>
				<th>Статус</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include 'db_connection.php';
				$connection = getDbConnection();
				$sql = "SELECT * FROM events;";
				$result = mysqli_query($connection, $sql);
				
				for($i = 0; $i < mysqli_num_rows($result); $i++)
				{
					echo '<tr>';
					$row = $result->fetch_assoc();
					echo '<td>' . $i+1 . '</td>';
					echo '<td>' . $row['Name'] . '</td>';
					echo '<td>' . $row['Beginning'] . '</td>';
					echo '<td>' . $row['Category'] . '</td>';
					echo '<td>' . $row['Status'] . '</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>

</div>

<?php include 'footer.php'  ?>

	
	<script src="../scripts.js"></script>
</body>
</html>
