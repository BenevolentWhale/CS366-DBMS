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

<h2><a href="fantasyTeam.php">Add Players</a></h2>


<table>
	<tr>
		<th>Lname</th>
		<th>Fname</th>
		<th>TEAM</th>
		<th>Remove Player</th>
		
	</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "baseball");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connection_error);
}

$sql = "SELECT * from baseball.player2";
$search_result = $conn-> query($sql);

if ($search_result-> num_rows > 0){
	while ($row = $search_result-> fetch_assoc()){
		echo "<tr><td>" . $row["LNAME"] . "</td><td>" . $row["FNAME"] ."</td><td>" . $row["TEAM"] ."</td>
		<td><a href=delete.php?FNAME=".$row['FNAME'].">Delete</a></td>
		
		
		
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