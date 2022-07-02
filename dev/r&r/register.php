<?php

include "./functions/basics.php";
include "./functions/records.php";
include "./functions/users.php";

$user_name = "";
$fisrt_name = "";
$sur_name = "";
$e_mail = "";
$age = "";
$password = "";

session_start();

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);


if (isset($_POST['submit'])) {
	$user_name = $_POST['user_name'];
	$password_hash = $_POST['password_hash'];
	if (($user_name && $password_hash) == TRUE) {
		$sql = "SELECT user_id FROM users WHERE user_name = '" . $user_name . "' AND password_hash = '" . $password_hash . "'";
		$result = mysqli_query($conn, $sql);
		
		$user_name = "";
        $fisrt_name = "";
        $sur_name = "";
        $e_mail = "";
        $age = "";
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
            <li class="nav-link active"><a class="nav-link" href="./account.php">Account</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="inputs registe" id="register">
		<form class="form register" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input class="input" type="text" name="user_name" id="user_name" placeholder="Username" value="<?php echo $user_name; ?>">
            <input class="input" type="text" name="first_name" id="first_name" placeholder="Firstname" value="<?php echo $fisrt_name; ?>">
            <input class="input" type="text" name="sur_name" id="sur_name" placeholder="Surname" value="<?php echo $sur_name; ?>">
            <input class="input" type="text" name="e-mail" id="e-mail" placeholder="E-mail" value="<?php echo $e_mail; ?>">
            <input class="input" type="text" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>">
			<input class="input" type="password" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>">
			<input class="input" type="submit" name="submit" id="submit" value="OK">
		</form>	
	</div>
	
	<footer class="footer" id="register-foot">
		<div class="foot-text">
			<p id="foot-text">Leoš Gjumija 2022</p>
		</div>
	</footer>
</body>
</html>
