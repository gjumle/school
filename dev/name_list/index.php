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
<head>
    <script src="master.js"></script>
</head>
<body>
<form action="" method="post">
    <label for="text_in">Insert name: </label>
    <input type="text" name="text_in" id="text_in">
    <input type="submit" onclick="empty_check()">
</form>
</body>

</html>

