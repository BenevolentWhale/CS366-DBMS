<!DOCTYPE>
<html>

<head>
</head>

<body>

<a href="index.html">Home</a>

<img src="header.jpg">

<h2><a href="displayFT.php">Display Team</a></h2>


<form method="post" action="fantasyTeam.php">
			<input type="text" name="first" placeholder="First Name">
			<input type="text" name="last" placeholder="Last Name">
			<input type="text" name="team" placeholder="Team">
		
			<input type="submit" name="submit" value="Find">
		</form>

</form>



<?php
	if (isset($_POST['submit'])) {
		$connection = new mysqli("localhost", "root", "", "baseball");
		$first = $_POST['first'];
		$last = $_POST['last'];
		$team = $_POST['team'];


		$sql = "CALL insertPlayerFanTeam('".$first."', '".$last."', '".$team."')";
		
		
		if (!mysqli_query($connection, $sql)){
			echo 'Not inserted';
		}
		else {
			echo 'Player inserted';
		}
		
		
			
	}
?>





</body>

</html>