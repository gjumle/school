<?php

include "./functions/basics.php";
include "./functions/records.php";
include "./functions/users.php";

$user_name = "";
$password = "";

session_start();

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);


if (isset($_POST['submit'])) {
	$user_name = $_POST['user_name'];
	$age = $_POST['password_hash'];
	if (($user_name && $password_hash) == TRUE) {
		$sql = "SELECT user_id FROM users WHERE user_name = '" . $user_name . "' AND password_hash = '" . $password_hash . "'";
		$result = mysqli_query($conn, $sql);
		
		$user_name = "";
		$password_hash = "";
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
			<li class="nav-link"><a class="nav-link" href="./records.php">Records</a></li>
			<li class="nav-link"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link active"><a class="nav-link" href="./logon.php">Account</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="inputs login" id="login">
		<form class="form login" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input class="input" type="text" name="user_name" id="user_name" placeholder="Username" value="<?php echo $user_name; ?>">
			<input class="input" type="text" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>">
			<input class="input" type="submit" name="submit" id="submit" value="OK">
		</form>	
	</div>
	
	<footer class="footer">
		<div class="foot-text">
			<p id="foot-text">Leoš Gjumija 2022</p>
		</div>
	</footer>
</body>
</html>
