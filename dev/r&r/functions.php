<?php 

function db_conn($hostname, $username, $password, $db) {
    $conn = mysqli_connect($hostname, $username, $password, $db);

    if (!$conn) {
        die("Connection error: " . mysqli_connect_error() . "<br>");
    }
    return $conn;
}

function success($theme) {
	return $theme . " was successful.";
}

function error_n($theme) {
	global $conn;
	return $theme . " error:" . mysqli_error($conn);
}


function insert_user($username) {
	global $conn;
	$sql = "INSERT INTO users (user_name) VALUES ('" . $username . "')";
	if (mysqli_query($conn, $sql)) {
		return success('User creation');
	} else {
		return error_n('User creation');
	}
}

function get_user($username) {
	global $conn;
	$sql = "SELECT u_id FROM users WHERE user_name ='" . $username . "'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$user_id = $row["u_id"];
			return $user_id;
		}
	} else {
		return "0 results.";
	}
}

function insert_data($distance, $str_time, $user_id) {
	global $conn;
	$sql = "INSERT INTO records (distance, time_rec, user_id) VALUES (" . $distance . ", '" . $str_time . "', '" . $user_id . "')";
	if (mysqli_query($conn, $sql)) {
		return success('Data insert');
	} else {
		return error_n('Data insert');
	}
}

function get_records($result) {
	global $conn;
	$sql = "SELECT r_id ID, distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id";
	$result = mysqli_query($conn, $sql);
	echo "<div class='outputs' style='display: flex; justify-content: center; align-items: center; height: 50vh'>";
	echo "<table class='table' style='border: 1px solid black; width: 60vw; border-collapse: collapse; margin: auto; text-align: center'>";
	echo "<tr class='output'><th style='border: 1px solid black; padding: 14px 16px;'>ID</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Distance (Km)</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Time (HH:MM:SS)</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Username</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px; colspan='2';'>Modify</th></tr>";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='output'><td style='border: 1px solid black; padding: 7px 8px;'>". $row["ID"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Distance"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Time"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Username"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'><a style='color: green;' href='?edit_id=" . $row["ID"] . "'>Edit</a></td><td style='border: 1px solid black; padding: 7px 8px;'><a style='color: red;' onclick ='delete_check()' href='?delete_id=" . $row["ID"] . "''>Delete</a></td></tr>";
		}
		echo "</table></div>";
	} else {
		return "0 results.";
	}
}

function get_record($r_id) {
	global $conn;
	$sql = 'SELECT r_id ID, distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id WHERE r_id =' . $r_id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$distance = $row['Distance'];
			$str_time = $row['Time'];
			$username = $row['Username'];
		}
	} else {
		return "0 results.";
	}
}

function delete_record($r_id) {
	global $conn;
	$sql = 'DELETE FROM records WHERE r_id =' . $r_id . ' LIMIT 1';
	if (mysqli_query($conn, $sql)) {
		return $result = mysqli_query($conn, $sql);
	} else {
		return error_n('Data delete');
	}
}

function update_record($r_id, $distance, $str_time, $user_id) {
	global $conn;
	$sql = 'UPDATE records SET distance =' . $distance . ', str_time ="' . $str_time . '", username ="' . $user_id . '" WHERE r_id =' . $r_id;
	if (mysqli_query($conn, $sql)) {
		return $result = mysqli_query($conn, $sql);
	} else {
		return error_n('Data update');
	}
}