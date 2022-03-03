<?php

include "./functions.php";

if (form_true_check() === TRUE) {
	$conn = db_conn('rr', 'localhost');

	$distance = $_POST['distance'];

	$str_time = $_POST['time'];
	$arr_time = timeToArr($str_time);

	$username = $_POST['username'];
	$user_id = user_check($username);

	$insert_log = "INSERT INTO records (distance, time_rec) VALUES (" . $distance . ", '" . $str_time . "', '" . $username . "')";

	echo get_data();
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
	<div class="outputs">
		<table>
			<tr>
				<th>Distance</th>
				<th>Time</th>
				<th>Username</th>
			</tr>
			<tr>
				<td></td>
			</tr>
		</table>
	</div>
</body>
</html>
