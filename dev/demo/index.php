<?php

echo "<link rel='stylesheet' href='./styles.css'>";

$conn = mysqli_connect('localhost', 'demo', 'demo', 'demo');

$distance = '';
$time = '';
$username = '';

if (!$conn) {
    die("Connection failed.");
}

echo "Connection succesfull.";

$section = array('input', 'records', 'about');

$page = $_GET['page'];

echo "<ul>";

foreach ($section as $row) {
    echo "<li><a href=\"index.php?page=$row\"";

    if ($row == $page) {
        echo "class=\"selected\"";
    }
    
    echo ">$row</a></li>\n";
}

echo "</ul>";

$form = array('distance', 'time', 'username');

echo "<form action='' method='post'>";

foreach ($form as $input) {
    echo "<input type='text' value='" . $input . "' id=" . $input . " name=" . $input . " placeholder=" . $input . ">";
}

echo "<input type='submit' name='submit' id='submit' value='OK'>";
echo "</form>";

if (isset($_POST['distance']) && isset($_POST['time']) && isset($_POST['username'])) {
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $username = $_POST['username'];
    if (isset($_POST['sumbmit'])) {
        if (isset($_GET['edit_id'])) {
            $id = $_GET['edit_id'];
            $result = mysqli_query($conn, $sql);
            if (mysqli_fetch_assoc($result)) {
                $row = mysqli_fetch_assoc($result);
                $distance = $row['distance'];
                $time = $row['distance'];
                $username = $row['username'];
            }
            $sql = 'UPDATE records SET distance = ' . $distance . ' WHERE id=' . $id;
            $sql .= 'UPDATE records SET time = ' . $time . ' WHERE id=' . $id;
            $sql .= 'UPDATE records SET username = ' . $username . ' WHERE id=' . $id;
        } elseif (isset($_GET['delete_id'])){
            $id = $_GET['delete_id'];
            $sql = 'DELETE FROM records WHERE id =' . $id . ' LIMIT 1';
        } else {
            $sql = 'INSERT INTO records (distance, time, username) VALUES ("' . $distance . '", "' . $time . '", "' . $username . '")';
        }
        $result = mysqli_query($conn, $sql);
    }
    
}

$sql = 'SELECT * FROM records';
$result = mysqli_query($conn, $sql);
if (mysqli_fetch_assoc($result)) {
    echo "<table border=1'>";
    echo "<tr><th>ID</th><th>Distance</th><th>Time</th><th>Usernname</th><th colspan=2 >Action</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $row['id'] . "</td>
                <td>" . $row['distance'] . "</td>
                <td>" . $row['time'] . "</td>
                <td>" . $row['username'] . "</td>
                <td><a href='?edit_id=" . $row['id'] . "'>Edit<a/></td>;
                <td><a href='?delete_id=" . $row['id'] . "'>Delete</a></td>
                </tr>";
    }
    echo "</table>";
}