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
	<title>ADminView</title>
</head>
<body>
	<?php
		require_once 'Views/Common/bar.php'
	?>
	<div class="table_container">
		<table class="table-striped">
			<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">login</th>
				<th scope="col">email</th>
				<th scope="col">imie</th>
				<th scope="col">nazwisko</th>
				<th scope="col">pokój</th>
				<th scope="col">uprawnienia</th>

			</tr>
			</thead>
			<tbody>

			<?php
				if(isset($variables[0]))
				{
					$array = $variables[0];

//					echo $array[1];

					echo "<tr>";
					$i = 0;
					foreach($array as $user)
					{

						if(!($i % 7))
						{
							echo "<tr>";
						}
						echo "<td>$user</td>";
						$i++;
					}

				}
				echo '</tbody> </table>';

			?>
			</tbody>

		</table>

	</div>



</body>
</html>