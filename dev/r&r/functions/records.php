<?php

function get_value_r($conn, $id, $value) {
    $sql = 'SELECT ' . $value . ' FROM web_records WHERE ID =' . $id;
	echo $sql;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		return $row[$value];
	} else {
        return error_n($conn, "Data fetch");
    }
}

function get_distance($conn, $distance) {
	$sql = "SELECT d_id FROM distance WHERE user_name ='" . $distance . "'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$user_id = $row["d_id"];
			return $distance_id;
		}
	} else {
		return "0 results.";
	}
}
