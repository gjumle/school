<?php

$conn = mysqli_connect('localhost', 'r_admin', 'runrecord', 'rr');

if (!$conn) {
    die("Connection failed.");
}

echo "Connection succesfull.";

$site = array('home', 'records', 'about');

foreach ($site as $item) {
    echo "<li><a href='?page=" . $item. "'>" . $item . "</a></li>";
}