<?php

function get_value($conn, $id, $value) {
    $sql = 'SELECT ' . $value . ' FROM web_records WHERE r_id =' . $id;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		return $row[$value];
	} else {
        return error_n($conn, "Data fetch");
    }
}
