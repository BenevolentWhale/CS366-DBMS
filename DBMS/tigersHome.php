<!DOCTYPE>
<html>

<head>
<title>Table with database</title>
<style type = "text/css">
	table {
		border-collapse: collapse;
		width: 100%;
		font-family: monospace;
		font-size: 20px;
		text-align: left;
	}
	
	th{
		background-color: #009933;
		color: white;
	}
	
	tr:nth-child(even) {background-color: #ffffe6}
	
</style>
</head>

<body>

<a href="index.html">Home</a>
<a href="teams.php">Teams</a>

<img src="header.jpg">

<h2><a href="tigers.php">Players</a>     <a href="tigersHome.php">Home Games</a>     <a href="tigersAway.php">Away Games</a></h2>

<table>
	<tr>
		<th>Year</th>
		<th>Month</th>
		<th>Day</th>
		<th>Home</th>
		<th>Home Score</th>
		<th>Away</th>
		<th>Away Score</th>
		<th>Location</th>
		
	</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "baseball");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connection_error);
}

$sql = "SELECT * FROM game INNER JOIN team ON game.hometeam = team.teamid AND team.teamid LIKE '%T%' ORDER BY year DESC, month DESC, day DESC";
$result = $conn-> query($sql);

if ($result-> num_rows > 0){
	while ($row = $result-> fetch_assoc()){
		echo "<tr><td>" . $row["year"] ."</td><td>". $row["month"] . "</td><td>" . $row["day"] ."</td>
		<td>" . $row["hometeam"] ."</td><td>" . $row["homescore"] . "</td><td>" . $row["awayteam"] . "</td><td>" . $row["awayscore"] ."</td>
		<td>" . $row["location"] ."</td>
		
		</tr>";
	}
	echo "</table>";
}
else {
	echo "0 result";
}

$conn-> close();
?>
	
</table>



</body>

</html>