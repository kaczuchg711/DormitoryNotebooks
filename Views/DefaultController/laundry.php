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
			<tr>
				<td>01.01.16</td>
				<td>Urszula</td>
				<td>Marciniak</td>
				<td>44</td>
				<td>11:58</td>
				<td>12:17</td>
				<td>3</td>
			</tr>
			<?php
				$rows =
					[
						row1 =>
							[
								'data' => '01.01.16',
								'imię' => 'Urszula',
								'nazwisko' => 'Marciniak',
								'numer pokoju' => 44,
								'godzina pobrania' => '11:58',
								'godzina oddania' => '12:17',
								'nr pralni' => 2,
							],
						row2 =>
							[
								'data' => '01.01.16',
								'imię' => 'Urszula',
								'nazwisko' => 'Marciniak',
								'numer pokoju' => 44,
								'godzina pobrania' => '11:58',
								'godzina oddania' => '12:17',
								'nr pralni' => 22,
							]
					];

				foreach($rows as $rowa)
				{
					echo "<tr>";
					echo "<td>" . $rowa['data'] . "</td>";
					echo "<td>" . $rowa['imię'] . "</td>";
					echo "<td>" . $rowa['nazwisko'] . "</td>";
					echo "<td>" . $rowa['numer pokoju'] . "</td>";
					echo "<td>" . $rowa['godzina pobrania'] . "</td>";
					echo "<td>" . $rowa["godzina oddania"] . "</td>";
					echo "<td>" . $rowa["nr pralni"] . "</td>";
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