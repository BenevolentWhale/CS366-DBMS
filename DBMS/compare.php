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


<p>Compare player stats by typing in either both player's first name or both player's last name</p>


<form method="post" action="compare.php">
			<input type="text" name="first" placeholder="First Player First Name">
			<input type="text" name="last" placeholder="First Player Last Name">
			<input type="text" name="first2" placeholder="Second Player First Name">
			<input type="text" name="last2" placeholder="Second Player Last Name">
		
			<input type="submit" name="submit" value="Find">
		</form>



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
		// Getting the first players name from form and displaying stats 
	if (isset($_POST['submit'])) {
		$connection = new mysqli("localhost", "root", "", "baseball");
		$first = $connection->real_escape_string($_POST['first']);
		$last = $connection->real_escape_string($_POST['last']);

		//$result = mysqli_query($conn, "CALL searchPlayer()"); 
		//This stored procedure broke somehow and is replaced with a non stored procedure

		$sql = $connection->query("SELECT * FROM `player` WHERE `FNAME` LIKE '%$first%' AND `LNAME` LIKE '%$last%'");
		if ($sql->num_rows > 0) {
			while ($data = $sql->fetch_array()){
				echo "<tr><td>" . $data["BATS"] ."</td><td>". $data["LNAME"] . "</td><td>" . $data["FNAME"] ."</td>
				<td>" . $data["G"] ."</td><td>". $data["PA"] . "</td><td>" . $data["AB"] ."</td>
				<td>" . $data["R"] ."</td><td>". $data["H"] . "</td><td>" . $data["2B"] ."</td>
				<td>" . $data["3B"] ."</td><td>". $data["HR"] . "</td><td>" . $data["TB"] ."</td>
				<td>" . $data["RBI"] ."</td><td>". $data["SB"] . "</td><td>" . $data["CS"] ."</td>
				<td>" . $data["SH"] ."</td><td>". $data["SF"] . "</td><td>" . $data["BB"] ."</td>
				<td>" . $data["IBB"] ."</td><td>". $data["HP"] . "</td><td>" . $data["SO"] ."</td>
				<td>" . $data["GDP"] ."</td><td>". $data["AVG"] . "</td><td>" . $data["SLG"] ."</td>
				<td>" . $data["OBP"] ."</td><td>". $data["TEAM"] . "</td><td>" . $data["YEAR"] ."</td>
		
				</tr>";
			} 
		
		}
		else{
			echo "Your search query doesn't match any data!";
			
			
		}
		
		
		//Getting SECOND player from form and displaying stats
		$first2 = $connection->real_escape_string($_POST['first2']);
		$last2 = $connection->real_escape_string($_POST['last2']);

		//$result = mysqli_query($conn, "CALL searchPlayer()"); 
		//This stored procedure broke somehow and is replaced with a non stored procedure


		$sql2 = $connection->query("SELECT * FROM `player` WHERE `FNAME` LIKE '%$first2%' AND `LNAME` LIKE '%$last2%'");
		if ($sql2->num_rows > 0) {
			while ($data2 = $sql2->fetch_array()){
				echo "<tr><td>" . $data2["BATS"] ."</td><td>". $data2["LNAME"] . "</td><td>" . $data2["FNAME"] ."</td>
				<td>" . $data2["G"] ."</td><td>". $data2["PA"] . "</td><td>" . $data2["AB"] ."</td>
				<td>" . $data2["R"] ."</td><td>". $data2["H"] . "</td><td>" . $data2["2B"] ."</td>
				<td>" . $data2["3B"] ."</td><td>". $data2["HR"] . "</td><td>" . $data2["TB"] ."</td>
				<td>" . $data2["RBI"] ."</td><td>". $data2["SB"] . "</td><td>" . $data2["CS"] ."</td>
				<td>" . $data2["SH"] ."</td><td>". $data2["SF"] . "</td><td>" . $data2["BB"] ."</td>
				<td>" . $data2["IBB"] ."</td><td>". $data2["HP"] . "</td><td>" . $data2["SO"] ."</td>
				<td>" . $data2["GDP"] ."</td><td>". $data2["AVG"] . "</td><td>" . $data2["SLG"] ."</td>
				<td>" . $data2["OBP"] ."</td><td>". $data2["TEAM"] . "</td><td>" . $data2["YEAR"] ."</td>
		
				</tr>";
			} 
		echo "</table>";
		}
		else{
			echo "Your search query doesn't match any data!";
			
			
		}
			
			
	}
?>






</body>

</html>