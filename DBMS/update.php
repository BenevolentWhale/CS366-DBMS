<!DOCTYPE>
<html>

<head>
</head>

<body>

<a href="index.html">Home</a>

<img src="header.jpg">

<p>To change the team a player is on please type in the first name, last name, and the player's NEW team.</p>

<form method="post" action="update.php">
			<input type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="team" placeholder="New Team">
		
			<input type="submit" name="submit" value="Find">
		</form>

</form>



<?php
	if (isset($_POST['submit'])) {
		$connection = new mysqli("localhost", "root", "", "baseball");
		$first = $connection->real_escape_string($_POST['first']);
		$last = $connection->real_escape_string($_POST['last']);


		$sql = "UPDATE player SET TEAM = '$_POST[team]' WHERE `FNAME` LIKE '%$first%' AND `LNAME` LIKE '%$last%'";
		mysqli_query($connection, $sql);
		
		
			
	}
?>



</body>

</html>
