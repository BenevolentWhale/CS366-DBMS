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

<img src="header.jpg">

<h2><a href="players.php">Players</a>     <a href="search.php">Player Search</a>     <a href="compare.php">Player Comparison</a></h2>

<h2>Player layout</h2>
<p>Use the "Teams" tab in order to see players by team, or search for a player using "Player Search."</p>

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
$counter = 0;

//Stored procedure to print a section of players onto the screen.

$result = mysqli_query($conn, "CALL playerDisplay()");


	while ($row = mysqli_fetch_array($result)){
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
		
		$counter = $counter + 1;
		
		if ($counter > 9)
			break;
		
	}
	echo "</table>";


$conn-> close();
?>
	
</table>


</body>

</html>