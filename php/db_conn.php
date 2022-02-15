<?php
$servername = "localhost";
$username = "root";
$password = "root";

$conn = mysqli_connect($servername, $username, $password,);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

$sql = "CREATE DATABASE testDB";

if (mysqli_query($sql, $conn)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error();
}

mysqli_close($conn);

?>
