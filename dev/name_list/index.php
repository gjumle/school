<?php
// DB Connection
$hostname = "localhost";
$username = "root";
$password = "";
$db = "names_list";

$conn = new mysqli($hostname, $username, $password, $db);

if ($conn->connect_error) {
    printf("Connection failed: " . $conn->connect_error);
} else {
    printf("Connected successfully. <br>");
}

$name = isset($_POST["text_in"]) ? $_POST["text_in"] : "";

$create_table = "CREATE TABLE IF NOT EXISTS names (
    n_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL DEFAULT '',
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if ($conn->query($create_table) === TRUE) {
    printf("Table names created successfully. <br>");
} else {
    printf("Error creating table: " . $conn->error);
}

$insert = "INSERT INTO names (name) VALUES ($name)";

if ($conn->query($insert) === TRUE) {
    $last_id = $conn->insert_id;
    printf("New record created successfully. <br>");
    printf("Last record is: " . $last_id . "<br>");
} else {
    printf("Error: " . $insert . "<br>" . $conn->error);
}

$conn->close();

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

