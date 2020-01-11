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

				require_once "Database.php";
				$db = new Database();
				$db->connect();
				$res = $db->get_laundry_log();
				$db->disconnect();

				$size = $res->rowCount();

				//				invert

				$array = array_fill(0, $size, null);

				while($row = $res->fetch(PDO::FETCH_NUM))
				{
					$array[--$size] = $row;
				}

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

		<form action="?page=laundry" method="post">
			<select>
				<option>1</option>
				<option>2</option>
				<option>3</option>
			</select>
			<button class="btn btn-primary">zarezerwuj</button>
		</form>
		<br/>

		<p id="t"></p>
	</div>

	<script>
        var myVar = setInterval(myTimer, 1000);

        function myTimer()
		{
            var d = new Date();
            document.getElementById("t").innerHTML = "aktualny czas: <br>" + d.toLocaleTimeString();
        }
	</script>

</body>
</html>