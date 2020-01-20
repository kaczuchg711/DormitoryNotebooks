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
	<!--	<meta http-equiv="refresh" content="1">-->
	<title>home</title>
	<script src="Public/js/home.js"></script>
</head>
<body>

	<?php
		require_once 'Views/Common/bar.php'
	?>

	<h2>Witaj<br>Co chcesz zrobić ?</h2>

	<div class="button_container">
		<form action="?page=laundry" method="post">
			<button class="home_button">Skorzystać z pralni</button>
		</form>
		<form>
			<button id="second_button" class="home_button">Zgłosić usterkę</button>
		</form>
		<form>
			<button class="home_button">Wynająć salę z bilardem</button>
		</form>
		<form>
			<button class="home_button">Wypożyczyć odkurzacz</button>
		</form>
		<form>
			<button class="home_button">Wypożyczyć suszarkę</button>
		</form>
		<?php
			if($variables[0])
			{
				Echo "		<form action='?page=show_users' method='post'>
								<button class=\"home_button\" >Panel urzytkowników</button>
							</form>";
			}

		?>
	</div>
</body>
</html>