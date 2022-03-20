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
	return $theme . " error:" . mysqli_error($conn);
}


function insert_user($conn, $username) {
	$sql = "INSERT INTO users (user_name) VALUES ('" . $username . "')";
	if (mysqli_query($conn, $sql)) {
		return success('User creation');
	} else {
		return error_n('User creation');
	}
}

function get_user($conn, $username) {
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

function insert_data($conn, $distance, $str_time, $user_id) {
	$sql = "INSERT INTO records (distance, time_rec, user_id) VALUES (" . $distance . ", '" . $str_time . "', '" . $user_id . "')";
	if (mysqli_query($conn, $sql)) {
		return success('Data insert');
	} else {
		return error_n('Data insert');
	}
}

function get_records($conn) {
	$sql = "SELECT r_id ID, distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id";
	$result = mysqli_query($conn, $sql);
	echo "<div class='outputs'>";
	echo "<table>";
	echo "<tr><th>ID</th>";
	echo "<th>Distance (Km)</th>";
	echo "<th>Time (HH:MM:SS)</th>";
	echo "<th>Username</th>";
	echo "<th colspan='2';'>Action</th></tr>";
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo "<tr>
				<td>". $row["ID"] . "</td>
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
}

function get_value($conn, $id, $value) {
    $sql = 'SELECT ' . $value . ' FROM records WHERE id =' . $id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		return $row[$value];
	} else {
        return error_n("Data fetch");
    }
}

function delete_record($r_id) {
	$sql = 'DELETE FROM records WHERE r_id =' . $r_id . ' LIMIT 1';
	if (mysqli_query($conn, $sql)) {
		return $result = mysqli_query($conn, $sql);
	} else {
		return error_n('Data delete');
	}
}

function update_record($r_id, $distance, $str_time, $user_id) {
	$sql = 'UPDATE records SET distance =' . $distance . ', str_time ="' . $str_time . '", username ="' . $user_id . '" WHERE r_id =' . $r_id;
	if (mysqli_query($conn, $sql)) {
		return $result = mysqli_query($conn, $sql);
	} else {
		return error_n('Data update');
	}
}