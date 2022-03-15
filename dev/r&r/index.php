<?php

include "./functions.php";

if (isset($_POST['distance'], $_POST['time'], $_POST['username'])) {
	$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr');

	$distance = $_POST['distance'];
	$str_time = $_POST['time'];
	$username = $_POST['username'];

	insert_user($username);
	insert_data($distance, $str_time, get_user($username));

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./styles.css">
	<script type="text/javascript" src="./master.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
	<div class="nav-bar">
		<ul class="nav-links">
			<li class="nav-link"><a class="nav-link" href="#">Home</a></li>
			<li class="nav-link"><a class="nav-link" href="#">Records</a></li>
			<li class="nav-link"><a class="nav-link" href="#">Statistics</a></li>
			<li class="nav-link"><a class="nav-link" href="#">About</a></li>
		</ul>
	</div>
	<div class="inputs" id="success">
		<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
			<input class="input" type="text" name="distance" id="distance" placeholder="Distance">
			<input class="input" type="text" name="time" id="time" placeholder="Time (HH:MM:SS)">
			<input class="input" type="text" name="username" id="username" placeholder="Username">
			<input class="input" type="submit" name="submit" id="submit" value="Save">
		</form>	
	</div>
	<?php get_records(); ?>
</body>
</html>


<?php

if (isset($_GET["edit_id"])) {
	get_record($_GET['edit_id']);
}

if (isset($_GET["delete_id"])) {
	delete_record($_GET['delete_id']);
}

$conn->close();

?>