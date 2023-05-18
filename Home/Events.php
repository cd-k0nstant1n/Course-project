<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="Events.css">
	<link rel="stylesheet" href="Home.css">
	<title>Document</title>
</head>
<body>

	<?php	include 'header.php';  ?>

<div class="container-table">
	<button class="delete_button" onclick="deleteFunction()">Изтрий ред</button>
	<button class="add_button" onclick="addFunction()">Добави ред</button>
	<table id="мyTable">
		<thead>
			<tr>
				<th>Събитиe</th>
				<th>Начало</th>
				<th>Категория</th>
				<th>Статус</th>
			</tr>
		</thead>
	</table>

</div>

<?php include 'footer.php'  ?>

	<script>
		function addFunction() {
  const myWindow = window.open("Event-Child-Page.php", "", "width=500,height=500");
		}
	</script>
	<script src="../scripts.js"></script>
</body>
</html>
