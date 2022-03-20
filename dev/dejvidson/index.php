<?php

include 'functions.php';

$conn = conn('localhost', 'dejvidson', 'dejvidson', 'dejvidson');

echo "<link rel='stylesheet' href='styles.css'";
echo "<script src='./master.js'></script>";
echo "<meta lang='cs' charset='utf-8'>";

$track_name = '';
$team_name = '';
$weather_name = '';
$controller_name = '';
$username = '';
$time = '';

?>

<form method=post>
    <input type='text' name='username' id='username' placeholder='Username'>
    <input type='text' name='time' id='time' placeholder='Cas'>
    <select name='track_name' id='track_name'>
        <option value="0">---Trať---</option>
        <option value="1">Bahrain - Bahrain International Circuit</option>
        <option value="2">Saudi Arabia - Jeddah</option>
        <option value="3">Australia - Albert Park, Melbourne</option>
        <option value="4">Italy - Imola</option>
        <option value="5">USA - Circuit of the Americas, Austin</option>
        <option value="6">Spain - Circuit de Catalunya, Barcelona</option>
        <option value="7">Monaco - Monaco</option>
        <option value="8">Azerbaijan - Baku City Circuit</option>
        <option value="9">Canada - Circuit Gilles Villeneuve</option>
        <option value="10">UK - Silverstone</option>
        <option value="11">Austria - Red Bull Ring, Spielberg</option>
        <option value="12">France - Circuit Paul Ricard, Le Castellet</option>
        <option value="13">Hungary - Hungaroring, Budapest</option>
        <option value="14">Belgium - Spa-Francorchamps</option>
        <option value="15">Netherlands - Zandvoort</option>
        <option value="16">Italy - Monza</option>
        <option value="17">Singapore - Marina Bay Street Circuit</option>
        <option value="18">Japan - Suzuka International Circuit</option>
        <option value="19">Mexico - Autódromo Hermanos Rodríguez, Mexico City</option>
        <option value="20">Brazil - Interlagos</option>
        <option value="21">UAE - Yas Marina Circuit</option>
    </select>
    <select name='team_name' id='team_name'>
        <option value="0">---Tým---</option>
        <option value="1">Mercedes</option>
        <option value="2">Red Bull</option>
        <option value="3">Ferrari</option>
        <option value="4">McLaren</option>
        <option value="5">AlphaTauri</option>
        <option value="6">Aston Martin</option>
        <option value="7">Alpine</option>
        <option value="8">Alfa Romeo</option>
        <option value="9">Williams</option>
        <option value="10">Haas</option>
    </select>
    <select name='weather_name' id='weather_name'>
        <option value="0">---Podmínky---</option>
        <option value="1">Sucho</option>
        <option value="2">Mokro</option>
    </select>
    <select name='controller_name' id='controller_name'>
        <option value="0">---Podmínky---</option>
        <option value="1">Sucho</option>
        <option value="2">Mokro</option>
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