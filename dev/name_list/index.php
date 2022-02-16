<?php
// DB Connection
$hostname = "localhost";
$username = "root";
$password = "";
$db = "names_list";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    printf("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.";



?>

<html lang="en">
<form action="" method="post">
    <label for="text_in">Insert name: </label>
    <input type="text" name="text_in">
    <input type="submit">
</form>
</html>