<?php
	if(!isset($_SESSION['user']))
	{
		$url = "http://$_SERVER[HTTP_HOST]/";
		header("Location: {$url}/DormitoryNotebooks?page=login");
	}

?>
<!Doctype html>
<html lang="pl">
<head title="Akademikowe Zeszyty">
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap-grid.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap-reboot.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/style.css"/>
	<meta charset="UTF-8">
	<!--		<meta http-equiv="refresh" content="1">-->
	<title>Pralnia</title>
	<!--	<meta http-equiv="refresh" content="1">-->
</head>
<body>
	<h2>Pralnia</h2>
	<div class="table_container">
		<table class="table-striped">
			<thead>
			<tr>
				<th scope="col">data</th>
				<th scope="col">imię</th>
				<th scope="col">nazwisko</th>
				<th scope="col">numer pokoju</th>
				<th scope="col">godzina pobrania</th>
				<th scope="col">godzina oddania</th>
				<th scope="col">nr pralni</th>
			</tr>
			</thead>
			<tbody>
			<?php
				$array = $variables[0];

				echo "<tr>";
				foreach($array as $line)
				{
					foreach($line as $cel)
					{
						echo "<td>" . $cel . "</td>";
					}
					echo "</tr>";
				}
				echo "</tr>";

			?>
			</tbody>
		</table>
	</div>

	<div class="small_container">
		<p>wybierz pralnię</p>

		<form action="?page=book_laundry" method="post">
			<select>
				<?php
					$array = $variables[1];

					foreach($array as $cel)
					{
						echo "<option>" . $cel . "</option>";
						echo $cel;
					}

				?>
			</select>
			<button class="btn btn-primary">zarezerwuj</button>
		</form>
		<br/>

		<p id="t"></p>
	</div>

	<script>
        var myVar = setInterval(myTimer, 1000);

        function myTimer() {
            var d = new Date();
            document.getElementById("t").innerHTML = "aktualny czas: <br>" + d.toLocaleTimeString();
        }
	</script>

</body>
</html>