<?php

include "./functions/basics.php";
include "./functions/records.php";
include "./functions/users.php";

$username = "";
$f_name = "";
$s_name = "";
$email = "";
$age = "";

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

if (isset($_GET["edit_id"])) {
	$e_id = $_GET['edit_id'];
    $username = get_value_u($conn, $e_id, 'username');
    $f_name = get_value_u($conn, $e_id, 'f_name');
    $s_name = get_value_u($conn, $e_id, 's_name');
	$email = get_value_u($conn, $e_id, 'email');
	$age = get_value_u($conn, $e_id, 'age');
}

if (isset($_GET["delete_id"])) {
	$d_id = $_GET['delete_id'];
    $sql = 'DELETE FROM records WHERE r_id =' . $d_id . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
}

if (isset($_POST['submit'])) {
	if (isset($_POST['username'], $_POST['f_name'], $_POST['s_name'], $_POST['email'], $_POST['age'])) {
		$user_id = get_user($conn, $username);
		if (isset($e_di)) {
			echo "Edituji . . . ";
			$sql = 'UPDATE users SET f_name =' . $f_name . ', s_name ="' . $s_name . '", email ="' . $email . '" WHERE u_id =' . $u_id;
		} else {
			$username = $_POST['username'];
			$f_name = $_POST['f_name'];
			$s_name = $_POST['s_name'];
			$email = $_POST['email'];
			$age = $_POST['age'];
			$sql = "INSERT INTO users (user_name, f_name, s_name, email, age) VALUES ('" . $username . "', '" . $f_name . "', '" . $s_name . "', '" . $email . "', '" . $age . "')";
		}
		$result = mysqli_query($conn, $sql);
	} else {
		echo "Fill out all fields";
	}
}


?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/records.css">
	<link rel="stylesheet" type="text/css" href="./css/users.css">
	<script type="text/javascript" src="./js/records.js"></script>
</head>
<body>
<div class="nav-bar">
		<ul class="nav-links">
			<li class="nav-link"><a class="nav-link" href="./index.php">Home</a></li>
			<li class="nav-link"><a class="nav-link" href="./records.php">Records</a></li>
			<li class="nav-link"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link active"><a class="nav-link" href="./users.php">User</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="inputs" id="success">
		<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<input class="input" type="text" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>">
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
</body>
</html>
