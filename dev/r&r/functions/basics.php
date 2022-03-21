<?php

function db_conn($hostname, $username, $password, $db, $ms) {
    $conn = mysqli_connect($hostname, $username, $password, $db);

    if (!$conn) {
        die("Connection error: " . mysqli_connect_error() . "<br>");
    }
    if ($ms == TRUE) {
        echo "<p class='connect'>Connection successfully created.</p>";
    }
    return $conn;
}

function success($theme) {
	return $theme . " was successful.";
}

function error_n($conn, $theme) {
	return $theme . " error:" . mysqli_error($conn);
}