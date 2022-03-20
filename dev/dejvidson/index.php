<?php

include 'functions.php';

$conn = conn('localhost', 'dejvidson', 'dejvidson', 'dejvidson');

$track_name = '';
$team_name = '';
$weather_name = '';
$controller_name = '';
$username = '';
$time = '';

?>

<form method=post>
    <input type='text' name='username' id='username' placeholder='username'>
    <input type='text' name='time' id='time' placeholder='time'>
    <select name='track_name' id='track_name'>
        <option value=0>--- select ---</option>
        <option value=1>Brno</option>
    </select>
    <select name='team_name' id='team_name'>
        <option value=0>--- select ---</option>
        <option value=1>****_sila</option>
    </select>
    <select name='weather_name' id='weather_name'>
        <option value=0>--- select ---</option>
        <option value=1>kocky_a_trakare</option>
    </select>
    <select name='controller_name' id='controller_name'>
        <option value=0>--- select ---</option>
        <option value=1>mys</option>
    </select>
    <input type='submit' name='submit' id='submit' value='OK'>
</form>

<?php

if (isset($_GET['delete_id'])){
    $d_id = $_GET['delete_id'];
    $sql = 'DELETE FROM track_results WHERE tr_res_id =' . $d_id . ' LIMIT 1';
    $result = mysqli_query($conn, $sql);
}

if (isset($_GET['edit_id'])){
    $e_id = $_GET['edit_id'];
    $track_name = get_value($conn, $e_id, 'track_name');
    $team_name = get_value($conn, $e_id, 'team_name');
    $weather_name = get_value($conn, $e_id, 'weather_name');
    $controller_name = get_value($conn, $e_id, 'controller_name');
    $username = get_value($conn, $e_id, 'username');
    $time = get_value($conn, $e_id, 'time');
}

if (isset($_POST['submit'])) {
    if (isset($_POST['track_name']) && isset($_POST['team_name']) && isset($_POST['weather_name']) && isset($_POST['controller_name']) && isset($_POST['username']) && isset($_POST['time'])) {
        if (isset($_GET['edit_id'])) {
            echo "Edituji...";
            $e_id = $_GET['edit_id'];
            $sql = 'UPDATE records SET  track_name = ' . $track_name . ', team_name = ' .$team_name . ', weather_name = ' . $weather_name . ', controller_name = ' . $controller_name . ',username=' .$username. ', time=' . $time . ' WHERE tr_res_id=' . $e_id;
        } else {
            $track_name = $_POST['track_name'];
            $team_name = $_POST['team_name'];
            $weather_name = $_POST['weather_name'];
            $controller_name = $_POST['controller_name'];
            $username = $_POST['username'];
            $time = $_POST['time'];
            $sql = 'INSERT INTO track_results (track_id, team_id, weather_id, controller_id, username, time) VALUES ("' . $track_name . '", "' . $team_name . '", "' . $weather_name . '", "' . $controller_name . '",  "' . $username . '", "' . $time . '")';
        }
        $result = mysqli_query($conn, $sql);
    } else {
        echo "Fill out all fields";
    }
}

$sql = 'SELECT * FROM v_result';
$result = mysqli_query($conn, $sql);
if (mysqli_fetch_assoc($result)) {
    echo "<table border=1'>";
    echo "<tr><th>ID</th><th>Track</th><th>Team</th><th>Weather</th><th>Controller</th><th>Username</th><th>Time</th><th colspan=2 >Action</th></tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>" . $row['tr_res_id'] . "</td>
                <td>" . $row['track_name'] . "</td>
                <td>" . $row['team_name'] . "</td>
                <td>" . $row['weather_name'] . "</td>
                <td>" . $row['controller_name'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['time'] . "</td>
                <td><a href='?edit_id=" . $row['tr_res_id'] . "'>Edit<a/></td>;
                <td><a onclick='delete_ok()' href='?delete_id=" . $row['tr_res_id'] . "'>Delete</a></td>
                </tr>";
    }
    echo "</table>";
} else {
    echo "Empty set.";
}