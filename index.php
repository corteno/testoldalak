<?php
include('login.php'); // Includes Login Script

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testoldalak Bejelentkezés</title>
	<link rel="stylesheet" type="text/css" href="style.css" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">

</head>
<body>

<form action="" method="post">
	<h1>Testoldalak</h1>
	<div class="container">
		<div class="input-wrapper">
			<input name="username" type="text" id="input" required>
			<label>Felhasználónév</label>
			<div class="bar"></div>
		</div>

		<div class="input-wrapper">
			<input name="password" type="password" id="input" required>
			<label>Jelszó</label>
			<div class="bar"></div>
		</div>

		<button name="submit" type="submit" class="login-button">Bejelentkezés</button>

		<p class="error"><?php echo $error; ?></p>
	</div>



</form>

</body>
</html>


