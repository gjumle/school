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
	$ret = implode(":", $str);
	return $ret;
}

