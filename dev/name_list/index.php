<?php

include "functions.php";

// DB Connection
$conn = db_conn("names_list", "localhost");

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

if ($_POST["text_in"] == "") {
    echo "Fill out the fields! <br>";
} else {
    $insert = "INSERT INTO names (name) VALUES ('".$_POST["text_in"]."')";
    if ($conn->query($insert) === TRUE) {
        $last_id = $conn->insert_id;
        printf("New record created successfully. <br>");
        printf("Last record ID is: " . $last_id . "<br>");
    } else {
        printf("Error: " . $insert . "<br>" . $conn->error);
    }
}


$select = "SELECT n_id, name, reg_date FROM names";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["n_id"] . " - Name: " . $row["name"]. " - Reg: " . $row["reg_date"] . "<br>";
    }
} else {
    echo "Empty set";
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

