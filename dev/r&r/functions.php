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

function timeToArr($str) {
	return $arr = explode(":", $str);
}

function form_true_check() {
	$is_distance = isset($_POST['distance']);
	$is_time = isset($_POST['time']);
	$is_username = isset($_POST['username']);

	if ($is_distance === TRUE && $is_time === TRUE && $is_username === TRUE) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function user_check($username) {
	$sql = "SELECT u_id FROM users WHERE user_name ='" . $username . "'";
	if ($conn->query($sql) === TRUE) {
		return $sql;
	}
	elseif ($conn->query($sql) === TRUE) {
	 	return $conn->connect_error;
	} else {
		$insert_user = "INSERT INTO users (user_name) VALUES ('" . $username . "')";
		if ($conn->query($sql) === TRUE) {
		return $sql;
		}
	}
}
