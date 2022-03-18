<?php

include "./functions.php";

echo "<link rel='stylesheet' href='./styles.css'>";
echo "<script src='./master.js'></script>";

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


if (isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $sql = 'DELETE FROM records WHERE id =' . $id . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
}

if (isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $distance = get_value($conn, $id, 'distance');
    $time = get_value($conn, $id, 'time');
    $username = get_value($conn, $id, 'username');
}

        

if (isset($_POST['submit'])) {
    if (isset($_POST['distance']) && isset($_POST['time']) && isset($_POST['username'])) {
        if (isset($_GET['edit_id'])) {
            $id = $_GET['edit_id'];
            $sql = 'UPDATE records SET distance = ' . $distance . ', time=' .$time . ', username=' . $username . ' WHERE id=' . $id;
        } else {
            $distance = $_POST['distance'];
            $time = $_POST['time'];
            $username = $_POST['username'];
            $sql = 'INSERT INTO records (distance, time, username) VALUES ("' . $distance . '", "' . $time . '", "' . $username . '")';
        }
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Fill out  the fields";
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
                <td><a onclick='delete_ok()' href='?delete_id=" . $row['id'] . "'>Delete</a></td>
                </tr>";
    }
    echo "</table>";
}

?>

<form method='post' action='./index.php'>
    <input type='text' placeholder='distance' name='distance' id='distance' value='<?php echo $distance ?>'>
    <input type='text' placeholder='time' name='time' id='time' value='<?php echo $time ?>'>
    <input type='text' placeholder='username' name='username' id='username' value='<?php echo $username ?>'>
    <input type='submit' name='submit' id='submit' value='OK' onclick='empty_check()'>
</form>
