<?php
$servername = "localhost";
$username = "effix";
$password = ",(+#}[ZLr)r$";
$databaseName = "effix_test";


/**
 	Used for connecting
 */
function connect(){
	// Create connection
	$conn = new mysqli($servername, $username, $password);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
}

?>