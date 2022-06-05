<?php

include "./functions/basics.php";
include "./functions/records.php";
include "./functions/users.php";

$user_name = "";
$f_name = "";
$s_name = "";
$email = "";
$age = "";

session_start();

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

if (isset($_GET["edit_id"])) {
	$_SESSION['edit_id'] = $_GET['edit_id'];
    $user_name = get_value_u($conn, $_SESSION['edit_id'], 'Username');
    $f_name = get_value_u($conn, $_SESSION['edit_id'], 'Firstname');
    $s_name = get_value_u($conn, $_SESSION['edit_id'], 'Surname');
	$email = get_value_u($conn, $_SESSION['edit_id'], 'Email');
	$age = get_value_u($conn, $_SESSION['edit_id'], 'Age');
}

if (isset($_GET['delete_id'])) {
	$d_id = $_GET['delete_id'];
    $sql = 'DELETE FROM users WHERE u_id =' . $d_id . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['submit'])) {
	$user_name = $_POST['user_name'];
	$f_name = $_POST['f_name'];
	$s_name = $_POST['s_name'];
	$email = $_POST['email'];
	$age = $_POST['age'];
	if (($user_name && $f_name && $s_name && $email && $age) == TRUE) {
		if ($_SESSION['edit_id'] != FALSE) {
			$sql = 'UPDATE users SET user_name ="' . $user_name . '", f_name ="' . $f_name . '", s_name ="' . $s_name . '", email ="' . $email . '", age =' . $age . ' WHERE u_id =' . $_SESSION['edit_id'];
		} else {
			$sql = "INSERT INTO users (user_name, f_name, s_name, email, age) VALUES ('" . $user_name . "', '" . $f_name . "', '" . $s_name . "', '" . $email . "', " . $age . ")";
		}
		$result = mysqli_query($conn, $sql);
		
		$user_name = "";
		$f_name = "";
		$s_name = "";
		$email = "";
		$age = "";
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
	<div class="inputs" id="users">
		<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input class="input" type="text" name="user_name" id="user_name" placeholder="Username" value="<?php echo $user_name; ?>">
			<input class="input" type="text" name="f_name" id="f_name" placeholder="Firstname" value="<?php echo $f_name; ?>">
			<input class="input" type="text" name="s_name" id="s_name" placeholder="Surname" value="<?php echo $s_name; ?>">
			<input class="input" type="text" name="email" id="email" placeholder="E-mail" value="<?php echo $email; ?>">
			<input class="input" type="text" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>">
			<input class="input" type="submit" name="submit" id="submit" value="OK">
		</form>	
	</div>
	<?php
		$sql = "SELECT * FROM web_users";
		$result = mysqli_query($conn, $sql);
		echo "<div class='outputs'>";
		echo "<table>";
		echo "<tr><th>ID</th>";
		echo "<th>Username</th>";
		echo "<th>Firstname</th>";
		echo "<th>Surname</th>";
		echo "<th>E-mail</th>";
		echo "<th>Age</th>";
		echo "<th colspan='2';'>Action</th></tr>";
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
					<td>". $row["ID"] . "</td>
					<td>" . $row["Username"] . "</td>
					<td>" . $row["Firstname"] . "</td>
					<td>" . $row["Surname"] . "</td>
					<td>" . $row["Email"] . "</td>
					<td>" . $row["Age"] . "</td>
					<td><a id='edit' href='?edit_id=" . $row["ID"] . "'>Edit</a></td>
					<td><a id='delete' onclick ='delete_check()' href='?delete_id=" . $row["ID"] . "''>Delete</a></td></tr>";
			}
			echo "</table></div>";
		} else {
			return "0 results.";
		}
	?>
	<footer class="footer" id="users-foot">
		<div class="foot-text">
			<p id="foot-text">Leoš Gjumija 2022</p>
		</div>
	</footer>
</body>
</html>
