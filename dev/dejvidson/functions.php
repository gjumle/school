<?php

function conn($host, $username, $password, $db) {
    $conn = mysqli_connect($host, $username, $password, $db);
    if (!$conn) {
        die("Nejede no");
    } else {
        return $conn;
    }
}

function get_value($conn, $id, $value) {
    $sql = 'SELECT ' . $value . ' FROM records WHERE id =' . $id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		return $row[$value];
	} else {
        return "Failed";
    }
}