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
	<title>home</title>
	<script src="Public/js/home.js"></script>
</head>
<body>

	<form action="?page=logout" method="post">
		<button id="logout">wyloguj</button>
	</form>

	<h2>Witaj<br>Co chcesz zrobić ?</h2>

	<div class="button_container">
		<form action="?page=laundry" method="post">
			<button class="home_button">Skorzystać z pralni</button>
		</form>
		<button id="second_button" class="home_button" onclick="foo()">Zgłosić usterkę</button>
		<button class="home_button">Wynająć salę z bilardem</button>
		<button class="home_button">Wypożyczyć odkurzacz</button>
		<button class="home_button">Wypożyczyć suszarkę</button>
	</div>

	<script>
        window.location.href


	</script>

</body>
</html>