<?php

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

function get_value_u($conn, $id, $value) {
    $sql = 'SELECT ' . $value . ' FROM web_users WHERE ID =' . $id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		return $row[$value];
	} else {
        return error_n($conn, "Data fetch");
    }
}