<?php

$conn = mysqli_connect('localhost', 'root', '', 'seznam');
if ($conn) {
    echo "Pripojeno";
} else {
    die("Chyba pripojeni");
}

$item = '';

session_start();

if (isset($_POST['edit_id'])) {
    $_SESSION['edit_id_r'] = $_GET['edit_id'];

    $sql = 'SELECT name FROM seznam WHERE s_id = ' . $_SESSION['edit_id'];
    $item = mysqli_query($conn, $sql);
}

?>

<form>
    <input type='text' id='polozka' name='polozka' value='<?php echo $item ?>'>
    <input type='submit' id='submit' name='submit' value='OK'>
</form>

<?php

$sql = 'SELECT * FROM seznam';
$result = mysqli_query($conn, $sql);
echo "<table>";
echo "<tr><th>s_id</th><th>name</th>";;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['s_id'] . "</td>";
        echo "<td><a id='edit' href='?edit_id=" . $row['s_id'] . "'>edit</a></td>";
        echo "<td>" . $row['name'] . "</td><tr>";
    }
    echo "</table>";
}