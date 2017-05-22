<?php
session_start(); // Starting Session

$adminUser = "effix";
$adminPass = "effix_2017";

$error = "";

if (isset($_POST['submit'])) {

// Define $username and $password
		$username = $_POST['username'];
		$password = $_POST['password'];

		if ($username == $adminUser && $password == $adminPass) {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: pages.php"); // Redirecting To Other Page
		} else {
			$error = "Felhasználónév vagy jelszó hibás!";
		}
}


?>