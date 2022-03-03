<?php

include "./functions.php";

if (form_true_check() === TRUE) {
	$conn = db_conn('rr', 'localhost');

	$distance = $_POST['distance'];
	$str_time = $_POST['time'];
	$username = $_POST['username'];

	$u_insert = insert_user($username);
	$user_id = get_user($username);
	$i_data = insert_data($distance, $str_time, $user_id);

	echo $u_insert, $user_id, $i_data;
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
		<table class="table">
			<tr class="output">
				<th>Distance</th>
				<th>Time</th>
				<th>Username</th>
			</tr>
			<?php get_data(); ?>
		</table>
	</div>
</body>
</html>
