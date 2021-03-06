<?php

include "./functions/basics.php";
include "./functions/records.php";
include "./functions/users.php";

$distance = "";
$str_time = "";
$user_name = "";
$result = "";

session_start();

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

if (isset($_GET["edit_id"])) {
	$_SESSION['edit_id_r'] = $_GET['edit_id'];

    $distance = get_value_r($conn, $_SESSION['edit_id_r'], 'Distance');
    $str_time = get_value_r($conn, $_SESSION['edit_id_r'], 'Time');
    $user_name = get_value_r($conn, $_SESSION['edit_id_r'], 'Username');

	$user_id = get_user($conn, $user_name);
}

if (isset($_GET["delete_id"])) {
	$d_id = $_GET['delete_id'];
    $sql = 'DELETE FROM records WHERE r_id =' . $d_id . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['submit'])) {
	$distance = $_POST['distance'];
	$str_time = $_POST['time'];
	$user_name = $_POST['user_name'];
	
	$user_id = get_user($conn, $user_name);
	if (($distance && $str_time && $user_id) != FALSE) {
		if (!$user_id) {
			echo "User does not exist. Change the username.";
		} else {
			if ($_SESSION['edit_id_r'] != FALSE) {
				$sql = 'UPDATE records SET distance_id =' . $distance . ', time_rec ="' . $str_time . '", user_id =' . $user_id . ' WHERE r_id =' . $_SESSION['edit_id_r'];
			} else {
				$sql = "INSERT INTO records (distance_id, time_rec, user_id) VALUES (" . $distance . ", '" . $str_time . "', '" . $user_id . "')";
			}
			$result = mysqli_query($conn, $sql);

			$distance = "";
			$str_time = "";
			$username = "";
			$result = "";
		}
	} else {
		echo "Fill out all fields";
	}
}


?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/master.css">
	<link rel="stylesheet" type="text/css" href="./css/foot.css">
	<script type="text/javascript" src="./js/records.js"></script>
</head>
<body>
<div class="nav-bar">
		<ul class="nav-links">
			<li class="nav-link"><a class="nav-link" href="./index.php">Home</a></li>
			<li class="nav-link active"><a class="nav-link" href="./records.php">Records</a></li>
			<li class="nav-link"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link"><a class="nav-link" href="./users.php">Users</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="inputs" id="records">
		<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<select class="input" name="distance" id="distance">
				<option value=0>Distance</option>
				<option value=1>1 Km</option>
				<option value=2>5 Km</option>
				<option value=3>10 Km</option>
				<option value=4>21 Km</option>
				<option value=5>31 Km</option>
				<option value=6>42 Km</option>
				<option value=7>62 Km</option>
			</select>
			<input class="input" type="text" name="time" id="time" placeholder="Time (HH:MM:SS)" value="<?php echo $str_time ?>">
			<input class="input" type="text" name="user_name" id="user_name" placeholder="Username" value="<?php echo $user_name ?>">
			<input class="input" type="submit" name="submit" id="submit" value="OK">
		</form>	
	</div>
	<?php
		$sql = "SELECT * FROM web_records";
		$result = mysqli_query($conn, $sql);
		echo "<div class='outputs'>";
		echo "<table>";
		echo "<tr><th>ID</th>";
		echo "<th>Date</th>";
		echo "<th>Distance (Km)</th>";
		echo "<th>Time (HH:MM:SS)</th>";
		echo "<th>Username</th>";
		echo "<th colspan='2';'>Action</th></tr>";
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
					<td>". $row["ID"] . "</td>
					<td>" . $row["Date"] . "</td>
					<td>" . $row["Distance"] . "</td>
					<td>" . $row["Time"] . "</td>
					<td>" . $row["Username"] . "</td>
					<td><a id='edit' href='?edit_id=" . $row["ID"] . "'>Edit</a></td>
					<td><a id='delete' onclick ='delete_check()' href='?delete_id=" . $row["ID"] . "''>Delete</a></td></tr>";
			}
			echo "</table></div>";
		} else {
			return "0 results.";
		}
	?>
	<footer class="footer">
		<div class="foot-text">
			<p id="foot-text">Leo?? Gjumija 2022</p>
		</div>
	</footer>
</body>
</html>
