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

	<!--	--><?php
		//		while ($row = mysql_fetch_array($query)) {
		//			echo "<tr>";
		//			echo "<td>".$row[ID]."</td>";
		//			echo "<td>".$row[Name]."</td>";
		//			echo "<td>".$row[Title]."</td>";
		//			echo "</tr>";
		//		}
		//
		//	?>

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



				while($row = $res->fetch(PDO::FETCH_NUM))
				{
					echo "<tr>";
//					echo "<td>" . $row[0] . "</td>";
//					echo "<td>" . $row[1] . "</td>";
//					echo "<td>" . $row[2] . "</td>";
//					echo "<td>" . $row[3] . "</td>";
//					echo "<td>" . $row[4] . "</td>";
//					echo "<td>" . $row[5] . "</td>";
//					echo "<td>" . $row[6] . "</td>";
					foreach($row as $x)
					{
						echo "<td>" . $x . "</td>";
					}
					echo "</tr>";
				}

			?>
			</tbody>
		</table>
	</div>

	<div class="small_container">
		<p>wybierz pralnię</p>
		<select>
			<option>1</option>
			<option>2</option>
			<option>3</option>
		</select>
		<button class="btn btn-primary">zarezerwuj</button>
	</div>

</body>
</html>