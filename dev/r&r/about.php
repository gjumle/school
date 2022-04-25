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
			<li class="nav-link"><a class="nav-link" href="./stats.php">Statistics</a></li>
            <li class="nav-link"><a class="nav-link" href="./users.php">Users</a></li>
			<li class="nav-link active"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="title" id="about">
		<h1>About this project</h1>
	</div>
	<div class="text-container">
		<div class="text" id="about">
			<p id="block-text-records">
				This website was created as a school project for the purouse of learning.
				The project containts two main pages. The first one is the 'records' page,
				which is used to input new records. There is only a basic form that puts the
				data into a local DB. When user input a datalog which has invalid username,
				records is not saved.
			</p>
			<br>
			<p id="block-text-statistics">
				The next page is called statistics. It is supposed to calculate some interesting
				graphs and analytics about the runner. It is unergoing progress.
			</p>
			<br>
			<p id="block-text-users">
				Last page that has something to do with DB is called 'users', where admin user
				can create and delete users - for now it can be done by any user. <br>
				There is also a simple form that create uses with the inforamtion given in by the visitor.
				When the form is send, the query creates a user. The records can be then saved under this username.
			</p>
		</div>
	</div>
	<div class="title" id="structure">
		<h1>DB structure</h1>
	</div>
	<div class="text-container">
		<div class="text" id="structure">
			<p id="block-text-structure">
				The sctructur of DB can be found on <a href="https://github.com/gjumle/school" target="_blank">GitHub</a> & is also described
				here in this text. So far the DB is only local, so if you want to deploy your own version of
				this project here is what you need:
			</p>
			<ul id="items">
				<li>Apache</li>
				<li>SQL server</li>
				<li>PHP</li>
			</ul>
			<p id="parametrs">
				The paramters for SQL DB are following. User: '<b>r_admin</b>', Password: '<b>runrecord</b>', DB: '<b>r&r</b>'.
				Any of these paramters <i>can</i> be changed in the files on line where connection variable is defined.
			</p>
		</div>
	</div>
	<div class="media">
			<img class="about-img" src="./svg/erd.svg">
	</div>
	<footer class="footer">
		<div class="foot-text">
			<p id="foot-text">Leoš Gjumija 2022</p>
		</div>
	</footer>
</body>
</html>
