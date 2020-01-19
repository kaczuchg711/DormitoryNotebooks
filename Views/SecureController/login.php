<!Doctype html>
<html lang="pl">
<head title="Akademikowe Zeszyty">
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap-grid.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/bootstrap-4.3.1-dist/css/bootstrap-reboot.css"/>
	<link rel="Stylesheet" type="text/css" href="Public/css/main.css"/>
	<meta charset="UTF-8">
	<!--		<meta http-equiv="refresh" content="1">-->
	<title>Akademikowe Zeszyty</title>
	<script src="Public/js/login.js"></script>
</head>
<body>
	<h2>Akademikowe zeszyty</h2>
	<div class="container">
		<div class="logo">
			<img src="Public/img/pk_logo.png" alt="logo">
		</div>

		<div class="login">
			<form class="login" action="?page=login" method="POST">
				<h3 id="login">Logowanie</h3>
				<p>Akademik</p>

				<select>
					<option>DS1 Rumcajs</option>
					<option>DS2 Leon</option>
					<option>DS3 Bartek</option>
					<option>DS4 Balon</option>
					<option>DS B-1 Bydgoska</option>
				</select>

				<p>e-mail</p>
				<input id="email" name="email" type="text" placeholder="email@email.com" onfocusout="check_login()">

				<p>hasło</p>
				<input name="password" placeholder="password" type="password">

				<div>
					<?php
						if(!empty($variables))
						{
							echo $variables[0];
						}
					?>
				</div>

				<button type="submit" class="btn btn-primary">Zaloguj</button>

			</form>

			<div class="registration_blue_bar">

				<p>Nie masz konta ?</p>
				<button class="btn btn-outline-primary" id="registration_button">Zarejstruj</button>

			</div>

		</div>
	</div>

</body>
</html>