<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Professional Information</h2>


<?php

echo "<table><tr><th>firstName</th><th>lastName</th><th>Job Title</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select firstName, lastName, jobTitle from attendees, professionals where attendees.ID = professionals.ID");

foreach($rows as $row) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["jobTitle"]."</td></tr>";
}


?>

<a href="attendeeMain.php"> Back </a>

</table>
</body>
</html> 
