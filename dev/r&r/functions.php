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
	echo "<div class='outputs'>";
	echo "<table class='table'>";
	echo "<tr class='output'><th>ID</th>";
	echo "<th class='table_head'>Distance (Km)</th>";
	echo "<th class='table_head'>Time (HH:MM:SS)</th>";
	echo "<th class='table_head'>Username</th>";
	echo "<th class='table_head' colspan='2';'>Modify</th></tr>";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr class='output'>
				<td class='table_data'>". $row["ID"] . "</td>
				<td class='table_data'>" . $row["Distance"] . "</td>
				<td class='table_data'>" . $row["Time"] . "</td>
				<td class='table_data'>" . $row["Username"] . "</td>
				<td class='table_data'><a class='edit' href='?edit_id=" . $row["ID"] . "'>Edit</a></td>
				<td class='table_data'><a class-'delete' onclick ='delete_check()' href='?delete_id=" . $row["ID"] . "''>Delete</a></td></tr>";
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