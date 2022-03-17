<?php

$conn = mysqli_connect('localhost', 'demo', 'demo', 'demo');

if (!$conn) {
    die("Connection failed.");
}

echo "Connection succesfull.";

$site = array('input', 'records', 'about');

echo "<ul>";

foreach ($site as $item) {
    echo "<li><a href='?page=" . $item. "'>" . $item . "</a></li>";
}

echo "</ul>";

$form = array('distance', 'time', 'username');

echo "<form action='' method='post'>";

foreach ($form as $input) {
    echo "<input type='text' id=" . $input . " name=" . $input . " placeholder=" . $input . ">";
}

echo "<input type='submit' name='submit' id='submit'>";
echo "</form>";

if (isset($_POST['distance']) && isset($_POST['time']) && isset($_POST['username'])) {
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $username = $_POST['username'];

    $sql = 'INSERT INTO records (distance, time, username) VALUES ("' . $distance . '", "' . $time . '", "' . $username . '")';
    if (mysqli_query($conn, $sql)) {
        echo "Data insert successful.";
    } else {
        echo "Data insert error : " . mysqli_error($conn);
    }

    $sql = 'SELECT * FROM records';
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result)) {
        echo "<table style='border: 1px solid black;'>";
        echo "<tr><th>ID</th><th>Distance</th><th>Time</th><th>Usernname</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . $row['id'] . "</td>
                  <td>" . $row['distance'] . "</td>
                  <td>" . $row['time'] . "</td>
                  <td>" . $row['username'] . "</td>
                  <td><a href='?edit_id=" . $row['id'] . "'</td>;
                  <td><a href='?delete_id=" . $row['id'] . "'</td></tr>"
        }
        echo "</table>";
    }
}