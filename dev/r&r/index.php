<?php

include "./functions.php";

$distance = isset($_POST['distance']) ? $_POST['distance'] : "";
$time = isset($_POST['time']) ? $_POST['time'] : "";

if ($distance === TRUE && $time === TRUE) {
	$conn = db_conn('rr', 'localhost');
}


?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./styles.css">
	<script type="text/javascript" src="./master.js"></script>
</head>
<body>
	<div class="inputs">
		<form action="" method="post">
			<input class="input" type="text" name="distance" id="distance" placeholder="Distance">
			<input class="input" type="text" name="time" id="time" placeholder="Time (HH:MM:SS)">
			<input class="input" type="text" name="username" id="username" placeholder="Username">
			<input class="input" type="submit" name="submit" id="submit" value="Save" onclick="empty_check()">
		</form>
	</div>
</body>
</html>
