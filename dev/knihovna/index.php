<?php

$conn = mysqli_connect('localhost', 'root', '', 'knihy');
if (!$conn) {
    die ('Connection failed');
}

$book = '';
$genre = '';

if (isset($_POST['submit'])) {
    $book = $_POST['book'];
    $genre = $_POST['genre'];
    $genre_id = 'SELECT g_id FROM genre WHERE genre =' . $genre;

    if (isset($_POST['delete'])) {
        $sql = 'DELETE FROM book WHERE b_id =' . $row['id'];
    }
    $sql = 'INSERT INTO book (name, genre_id) VALUES (' . $book . ', ' . $genre_id . ')';
    $result = mysqli_query($conn, $sql);
}



?>

<form method='POST' action='index.php'>
    <input type='text' id='book' name='book' placeholder='book'>
    <input type='text' id='genre' name='genre' placeholder='genre'>
    <input type='submit' id='submit' value='OK'>
    <input type='submit' id='delete' value='DEL'>
</form>

<?php

$sql = 'SELECT * FROM book';
$result = mysqli_query($conn, $sql);
echo "<table border 1px solid black>";
echo "<tr><th>id</th><th>book</th><th>genre</th></tr>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td>";
        echo "<td>" . $row['book'] . "</td>";
        echo "<td>" . $row['genre'] . "</td></tr>"; 
    }
    echo "</table>";
}