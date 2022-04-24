<?php

include './functions/basics.php';

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="./css/nav.css">
	<link rel="stylesheet" type="text/css" href="./css/master.css">
	<link rel="stylesheet" type="text/css" href="./css/foot.css">
	<script type="text/javascript" src="./js/records.js"></script>
</head>
<body>
	<div class="nav-bar">
		<ul class="nav-links">
			<li class="nav-link"><a class="nav-link" href="./index.php">Home</a></li>
			<li class="nav-link"><a class="nav-link" href="./records.php">Records</a></li>
			<li class="nav-link active"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link"><a class="nav-link" href="./users.php">User</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
</body>
</html>