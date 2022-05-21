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






<h2><a href="marines.php">Players</a>     <a href="marinesHome.php">Home Games</a>     <a href="marinesAway.php">Away Games</a></h2>

<table>
	<tr>
		<th>Bats</th>
		<th>Lname</th>
		<th>Fname</th>
		<th>G</th>
		<th>PA</th>
		<th>AB</th>
		<th>R</th>
		<th>H</th>
		<th>2B</th>
		<th>3B</th>
		
		<th>HR</th>
		<th>TB</th>
		<th>RBI</th>
		<th>SB</th>
		<th>CS</th>
		<th>SH</th>
		<th>SF</th>
		<th>BB</th>
		<th>IBB</th>
		<th>HP</th>
		
		<th>SO</th>
		<th>GDP</th>
		<th>AVG</th>
		<th>SLG</th>
		<th>OBP</th>
		<th>TEAM</th>
		<th>Year</th>
	</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "baseball");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connection_error);
}


$sql = "SELECT * FROM player INNER JOIN team ON player.TEAM = team.teamid AND team.teamid LIKE '%M%'";
$search_result = $conn-> query($sql);

if ($search_result-> num_rows > 0){
	while ($row = $search_result-> fetch_assoc()){
		echo "<tr><td>" . $row["BATS"] ."</td><td>". $row["LNAME"] . "</td><td>" . $row["FNAME"] ."</td>
		<td>" . $row["G"] ."</td><td>". $row["PA"] . "</td><td>" . $row["AB"] ."</td>
		<td>" . $row["R"] ."</td><td>". $row["H"] . "</td><td>" . $row["2B"] ."</td>
		<td>" . $row["3B"] ."</td><td>". $row["HR"] . "</td><td>" . $row["TB"] ."</td>
		<td>" . $row["RBI"] ."</td><td>". $row["SB"] . "</td><td>" . $row["CS"] ."</td>
		<td>" . $row["SH"] ."</td><td>". $row["SF"] . "</td><td>" . $row["BB"] ."</td>
		<td>" . $row["IBB"] ."</td><td>". $row["HP"] . "</td><td>" . $row["SO"] ."</td>
		<td>" . $row["GDP"] ."</td><td>". $row["AVG"] . "</td><td>" . $row["SLG"] ."</td>
		<td>" . $row["OBP"] ."</td><td>". $row["TEAM"] . "</td><td>" . $row["YEAR"] ."</td>
		
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