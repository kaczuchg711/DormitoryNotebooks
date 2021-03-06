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
	<title>Pralnia</title>
	<script>src = "Public/js/laundry.js" </script>
</head>
<body>
	<?php
		require_once 'Views/Common/bar.php'
	?>
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
				if(isset($variables[0]))
				{
					$array = $variables[0];

					echo "<tr>";
					foreach($array as $line)
					{

						foreach($line as $cel)
						{
							if($cel == '25:00:00')
							{
								$cel = '-';
							}
							echo "<td>" . $cel . "</td>";
						}
						echo "</tr>";
					}

				}
				echo '</tbody> </table>';

				if(isset($variables[3]))
				{
					echo $variables[3];
				}

			?>
			</tbody>

		</table>

	</div>

	<div class="small_container">

		<?php
			if($variables[2])
			{
				echo '<form  action="?page=cancel_laundry" method="post">';
				echo '<button class="btn btn-primary">anuluj</button>';
				echo '</form>';
			}
			else
			{
				echo '<p>wybierz pralnię</p>';
				echo '<form action="?page=book_laundry" method="post">';
				echo '<button class="btn btn-primary">rezerwuj</button>';
				echo '<select name="laundry_nr">';

				$array = $variables[1];

				foreach($array as $cel)
				{
					echo "<option>" . $cel . "</option>";
					echo $cel;
				}
				echo '</select>';
			}
		?>

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