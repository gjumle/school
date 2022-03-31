<?php

function insert_user($conn, $user_name) {
	$sql = "INSERT INTO users (user_name) VALUES ('" . $user_name . "')";
	if (mysqli_query($conn, $sql)) {
		return success('User creation');
	} else {
		return error_n('User creation');
	}
}

function get_user($conn, $user_name) {
	$sql = "SELECT u_id FROM users WHERE user_name ='" . $user_name . "'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			return $row["u_id"];
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