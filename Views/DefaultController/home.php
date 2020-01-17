<?php
	if(!isset($_SESSION['id']))
	{
		die('You are not logged in!');
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
	<title>home</title>
	<!--	<meta http-equiv="refresh" content="1">-->
</head>
<body>

	<form action="?page=logout" method="post">
		<button style="align-items: end">wyloguj</button>
	</form>

	<h2>Witaj<br>Co chcesz zrobić ?</h2>

	<div class="button_container">
		<form action="?page=laundry" method="post">
			<button class="home_button">Skorzystać z pralni</button>
		</form>
		<button class="home_button">Zgłosić usterkę</button>
		<button class="home_button">Wynająć salę z bilardem</button>
		<button class="home_button">Wypożyczyć odkurzacz</button>
		<button class="home_button">Wypożyczyć suszarkę</button>
	</div>
	</form>

</body>
</html>