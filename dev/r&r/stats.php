<?php

include './functions/basics.php';

$conn = db_conn('localhost', 'r_admin', 'runrecord', 'rr', FALSE);

$stats = "";

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
            <li class="nav-link"><a class="nav-link" href="./users.php">Users</a></li>
			<li class="nav-link"><a class="nav-link" href="./about.php">About</a></li>
		</ul>
	</div>
	<div class="inputs" id="records">
		<form class="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<select class="input" name="stats" id="stats">
				<option value=0>Statistics</option>
				<option value="SUM">SUM</option>
				<option value="AVG">AVG</option>
				<option value="COUNT">COUNT</option>
				
			</select>
			<input class="input" type="submit" name="submit" id="submit" value="OK">
		</form>	
	</div>
	<?php
		if (isset($_POST['submit'])) {
			$stats = $_POST['stats'];	
			switch($stats) {
				case "SUM":
					$sql = "SELECT * FROM web_stats_sum_by_user";
					$result = mysqli_query($conn, $sql);
					echo "<div class='outputs'>";
					echo "<table>";
					echo "<th>Distance (Km)</th>";
					echo "<th>Username</th>";
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								<td>" . $row["Distance"] . "</td>
								<td>" . $row["Username"] . "</td>";
						}
						echo "</table></div>";
					} else {
						return "0 results.";
					}
					break;
				case "AVG":
					$sql = "SELECT * FROM web_stats_avg_by_user";
					$result = mysqli_query($conn, $sql);
					echo "<div class='outputs'>";
					echo "<table>";
					echo "<th>Distance (Km)</th>";
					echo "<th>Username</th>";
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								<td>" . $row["Distance"] . "</td>
								<td>" . $row["Username"] . "</td>";
						}
						echo "</table></div>";
					} else {
						return "0 results.";
					}
					break;
				case "COUNT":
					$sql = "SELECT * FROM web_stats_count_by_user";
					$result = mysqli_query($conn, $sql);
					echo "<div class='outputs'>";
					echo "<table>";
					echo "<th>Distance (Km)</th>";
					echo "<th>Username</th>";
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
								<td>" . $row["Distance"] . "</td>
								<td>" . $row["Username"] . "</td>";
						}
						echo "</table></div>";
					} else {
						return "0 results.";
					}
					break;
				default:
					return "Select option.";
					break;
			}
		} 
	?>
	<footer class="footer">
		<div class="foot-text">
			<p id="foot-text">Leoš Gjumija 2022</p>
		</div>
	</footer>	
</body>
</html>