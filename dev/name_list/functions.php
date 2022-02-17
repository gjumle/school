<?php

function db_conn($db, $host) {
    $hostname = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname, $password, $password, $db);

    if ($conn->connect_error) {
        echo "Connection error: " . $conn->connect_error . "<br>";
    } else {
        echo "Connection successfull. <br>";
    }
    return $conn;
}
