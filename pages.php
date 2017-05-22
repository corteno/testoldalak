<?php
session_start();

if(isset($_SESSION['login_user'])){
	include('connect.php');
	$pagesArray = array();
	$arrayCounter = 0;

	for ($i = 1; $i < 8; $i++){
		if($i == 1){
			// Create connection
			$conn = new mysqli($servername, $username, $password, $databaseName);
			$conn->set_charset("utf8");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			/*echo "Connected successfully to ".$databaseName.'<br>';*/

			$query = 'SELECT option_value FROM wp_options WHERE option_id = 1 OR option_id = 3';
			$result = $conn->query($query);


			$tempArray = array();
			$tempCounter = 0;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					/*echo $row['option_value'].'<br>';*/

					$tempArray[$tempCounter] = $row['option_value'];
					$tempCounter++;
				}
			} else {
				echo "0 results";
			}
			$tempArray[$tempCounter] = $databaseName;
			array_push($pagesArray, $tempArray);



			//Close connection
			mysqli_close($conn);
		} else {
			$conn = new mysqli($servername, $username, $password, $databaseName.$i);
			$conn->set_charset("utf8");
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			/*echo "Connected successfully to ".$databaseName.$i.'<br>';*/
			$query = 'SELECT option_value FROM wp_options WHERE option_id = 3 OR option_id = 1';
			$result = $conn->query($query);


			$tempArray = array();
			$tempCounter = 0;
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					/*echo $row['option_value'].'<br>';*/

					$tempArray[$tempCounter] = $row['option_value'];
					$tempCounter++;
				}
			} else {
				echo "0 results";
			}


			$tempArray[$tempCounter] = $databaseName.$i;
			array_push($pagesArray, $tempArray);

			//Close connection
			mysqli_close($conn);
		}


	}
} else {
	header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Testoldalak</title>
	<link rel="stylesheet" type="text/css" href="style.css" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">

</head>
<body>
<div class="header">
	<p>Testoldalak</p>
	<a href="logout.php" class="logout-button"></a>
</div>
<ul class="site-list">


<?php
for ($i = 0; $i < count($pagesArray); $i++){
	?>
	<li>
		<p class="site-name"><?php echo '<span class = "site-title">'.$pagesArray[$i][1].'</span> - '.$pagesArray[$i][2]; ?></p>
		<p class="site-url"><a target="_blank" href="<?php echo $pagesArray[$i][0]; ?>"><?php echo $pagesArray[$i][0]; ?></a></p>

	<?php
	/*for ($j = 2; $j >= 0; $j--){
		echo $pagesArray[$i][$j].' ';
	}
	echo '<br>';*/
	?>
	</li>
		<?php
}
?>
</ul>
</body>
</html>
