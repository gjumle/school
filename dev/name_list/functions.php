<?php

function db_conn($db, $host) {
    $hostname = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($hostname, $password, $password, $db);

    if ($conn->connect_error) {
        echo "Connection error: " . $conn->connect_error . "<br>";
    } else {
        echo "Connected successfully. <br>";
    }
    return $conn;
}

function db_create_table($name, $id, $r1, $r2, $r3) {
    $sql = "CREATE TABLE IF NOT EXISTS " . $name . "(" . $id . "INT NOT NULL AUTO_INCREMENT PRIMARY KEY,";
}
