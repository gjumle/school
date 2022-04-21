<?php

include './functions/basics.php';

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

?>

<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="stylesheet" type="text/css" href="./css/about.css">
	<script type="text/javascript" src="./js/records.js"></script>
</head>
<body>
	<div class="nav-bar">
		<ul class="nav-links">
			<li class="nav-link active"><a class="nav-link" href="./index.php">Home</a></li>
			<li class="nav-link"><a class="nav-link" href="./records.php">Records</a></li>
			<li class="nav-link"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link"><a class="nav-link" href="./users.php">User</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="title">
		<h1>Wellcome to r&r</h1>
	</div>
	<div class="media-container">
		<div class="media">
			<img class="media-img" src="./svg/track.svg">
			<img class="media-img" src="./svg/data.svg">
			<img class="media-img" src="./svg/users.svg">
		</div>
	</div>
	<div class="text-container" id="media-text-container">
		<p class="media-text" id="media-text-records">
			Keep track of your progress.
		</p>
		<p class="media-text" id="media-text-data">
			Solid analytics.
		</p>
		<p class="media-text" id="media-text-users">
			Comparasion between users.
		</p>
		</div>
</body>
</html>