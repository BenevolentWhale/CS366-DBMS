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

<h2><a href="fantasyTeam.php">Add Players</a> <a href="displayFT.php">Display Team</a></h2>
<p>Player was removed.</p>

		

<?php
$conn = mysqli_connect("localhost", "root", "", "baseball");
if ($conn-> connect_error){
	die("Connection failed:". $conn-> connection_error);
}

$sql = "DELETE FROM player2 WHERE FNAME = '$_GET[FNAME]'";

mysqli_query($conn,$sql);
	


$conn-> close();
?>



</body>

</html>