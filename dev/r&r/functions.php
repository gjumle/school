<?php 

function db_conn($db, $host) {
    $hostname = $host;
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname, $username, $password, $db);

    if ($conn->connect_error) {
        echo "Connection error: " . $conn->connect_error . "<br>";
    }
    return $conn;
}


function insert_user($username) {
	global $conn;
	$insert_user = "INSERT INTO users (user_name) VALUES ('" . $username . "')";
	if ($conn->query($insert_user) === TRUE) {
		return "User " . $username . " created successfully.";
	} else {
		return "Error: " . $conn->errno;
	}
}

function get_user($username) {
	global $conn;
	$sql = "SELECT u_id FROM users WHERE user_name ='" . $username . "'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$user_id = $row["u_id"];
				return $user_id;
			}
		} else {
			return "0 results.";
		}
}

function insert_data($distance, $str_time, $user_id) {
	global $conn;
	$insert_data = "INSERT INTO records (distance, time_rec, user_id) VALUES (" . $distance . ", '" . $str_time . "', '" . $user_id . "')";
	if ($conn->query($insert_data) === TRUE) {
		return "Succesfull data insert.";
	} else {
		return "Error: " . $conn->errno . ".";
	}
}

function get_data() {
	global $conn;
	$sql = "SELECT distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr class='output'><td>" . $row["Distance"] . "</td><td>" . $row["Time"] . "</td><td>" . $row["Username"] . "</td></tr>";
		}
	} else {
		return "0 results.";
	}
}

function empty_post() {
	global $distance, $str_time, $username, $user_id;
	$distance = '';
	$str_time = '';
	$username = '';
	$user_id = '';
}
