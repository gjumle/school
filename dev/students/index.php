<?php

$text_in = $_POST["text_in"];
$class = $_POST["class"];

$host = "localhost";
$user = "root";
$password = "";
$db = "students";


$conn = new mysqli($host, $user, $password, $db);

if ($conn->connect_error) {
    echo "Database connection error: " . $conn->errno . ".<br>";
} else {
    echo "DB connection successful.<br>";
}

$name_arr = explode(" ", $text_in);
$name = $name_arr[0];
$sur_name = $name_arr[1];

$sql = "INSERT INTO students (name, sur_name, class_id) VALUES ('" . $name . "', '" . $sur_name . "', " . $class . ")";
if ($conn->query($sql)) {
    echo "Data insert successful.<br>";
} else {
    echo "Data insert error: " . $conn->errno . ".<br>";
}

$sql = "SELECT s_id, name, sur_name, class_id FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1><th>s_id</th><th>name</th><th>sur_name</th><th>class_id</th>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                 <td>" . $row["s_id"] ."</td>
                 <td>" . $row["name"] . "</td>
                 <td>" . $row["sur_name"] . "</td>
                 <td>" . $row["class_id"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results<br>";
}


$conn->close();

?>

<html lang="en">
<head>
    <script src="master.js"></script>
</head>
<body>
<form action="" method="post">
    <div style="margin: auto; width: 50%">
        <label for="tex_in">Student:</label>
        <input type="text" name="text_in" id="tex_in" placeholder="student name">

        <select name="class" id="class">
            <option value="">--- class ---</option>
            <option value="1">1.B</option>
            <option value="2">2.B</option>
            <option value="3">3.B</option>
            <option value="4">4.B</option>
        </select>
        <input type="submit" name="submit" id="submit" value="OK" onclick="empty_check()">
    </div>

</form>
</body>
</html>
