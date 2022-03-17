<?php

$conn = mysqli_connect('localhost', 'r_admin', 'runrecord', 'rr');

if (!$conn) {
    die("Connection failed.");
}

echo "Connection succesfull.";

$site = array('home', 'records', 'about');

echo "<ul>";

foreach ($site as $item) {
    echo "<li><a href='?page=" . $item. "'>" . $item . "</a></li>";
}

echo "</ul>";

$form = array('distance', 'time', 'user');

echo "<form action='' method='post'>";

foreach ($form as $input) {
    echo "<input type='text' id=" . $input . " name=" . $input . " placeholder=" . $input . ">";
}

echo "<input type='submit' name='submit' id='submit'";
echo "</form>";