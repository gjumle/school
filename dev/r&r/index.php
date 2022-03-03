<?php

include "./functions.php";

$is_distance = isset($_POST['distance']);
$is_time = isset($_POST['time']);
$is_username = isset($_POST['username']);


if ($is_distance === TRUE && $is_time === TRUE && $is_username === TRUE) {
	$conn = db_conn('rr', 'localhost');

	$distance = $_POST['distance'];
	$time = timeToArr($_POST['time']);
	echo $time;
	$username = $_POST['username'];


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
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input class="input" type="text" name="distance" id="distance" placeholder="Distance">
			<input class="input" type="text" name="time" id="time" placeholder="Time (HH:MM:SS)">
			<input class="input" type="text" name="username" id="username" placeholder="Username">
			<input class="input" type="submit" name="submit" id="submit" value="Save" onclick="empty_check()">
		</form>
	</div>
</body>
</html>
