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
	<button class="add_button" onclick="myFunction()">Добави ред</button>
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
		function myFunction() {
  const myWindow = window.open("Event-Child-Page.html", "", "width=500,height=500");
		}

		function addRow() {
			var table = document.getElementById("myTable");
			var row = table.insertRow();
			var event = prompt("Enter event:");
			var start = prompt("Enter start:");
			var category = prompt("Enter category:");
			var status = prompt("Enter status:");
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			cell1.innerHTML = event;
			cell2.innerHTML = start;
			cell3.innerHTML = category;
			cell4.innerHTML = status;
		}
	</script>
</body>
</html>
