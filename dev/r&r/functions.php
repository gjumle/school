<?php 

function db_conn($hostname, $username, $password, $db) {
    $conn = new mysqli($hostname, $username, $password, $db);

    if ($conn->connect_error) {
        echo "Connection error: " . $conn->connect_error . "<br>";
    }
    return $conn;
}


function insert_user($username) {
	global $conn;
	$insert_user = "INSERT INTO users (user_name) VALUES ('" . $username . "')";
	if ($conn->query($insert_user)) {
		return success('User creation');
	} else {
		return error_n('User creation');
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
	if ($conn->query($insert_data)) {
		return success('Data insert');
	} else {
		return error_n('Data insert');
	}
}

function get_data() {
	global $conn;
	$sql = "SELECT r_id ID, distance Distance, time_rec Time, user_name Username FROM records r JOIN users u ON r.user_id=u.u_id";
	$result = $conn->query($sql);
	echo "<div class='outputs' style='display: flex; justify-content: center; align-items: center; height: 50vh'>";
	echo "<table class='table' style='border: 1px solid black; width: 60vw; border-collapse: collapse; margin: auto; text-align: center'>";
	echo "<tr class='output'><th style='border: 1px solid black; padding: 14px 16px;'>ID</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Distance (Km)</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Time (HH:MM:SS)</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Username</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Edit</th>";
	echo "<th style='border: 1px solid black; padding: 14px 16px;'>Delete</th></tr>";
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo "<tr class='output'><td style='border: 1px solid black; padding: 7px 8px;'>". $row["ID"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Distance"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Time"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'>" . $row["Username"] . "</td><td style='border: 1px solid black; padding: 7px 8px;'><a style='color: green;' href='?edit_id=" . $row["ID"] . "'>Edit</a></td><td style='border: 1px solid black; padding: 7px 8px;'><a style='color: red;' onclick ='delete_check()' href='?delete_id=" . $row["ID"] . "''>Delete</a></td></tr>";
		}
		echo "</table></div>";
	} else {
		return "0 results.";
	}
}

function delete_record($r_id) {
	global $conn;
	$sql = 'DELETE FROM records WHERE r_id =' . $_GET['delete_id'] . ' LIMIT 1';
	if ($conn->query($sql)) {
		return success('Data delete');
	} else {
		return error_n('Data delete');
	}
}

function update_records($r_id) {
	
}