<?php
$servername = "localhost";
$username = "root";
$password = "root";

$mysqli = new mysqli($servername, $username, $password);

if ($mysqli->connect_errno) {
    printf("Connect failed: %s<br />", $mysqli->connect_error);
    exit();
}
printf('Connected successfully.<br />');

if ($mysqli->query("CREATE DATABASE")) {
    printf("Database created successfully.<br />");
}
if ($mysqli->errno) {
    printf("Could not create database: %s<br />", $mysqli->error);
}

$mysqli->close();

?>
