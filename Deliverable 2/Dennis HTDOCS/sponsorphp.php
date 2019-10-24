<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Sponsor Information</h2>


<?php

echo "<table><tr><th>First Name</th><th>Last Name</th><th>Company</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select firstName, lastName, companyName from attendees, sponsors where attendees.ID = sponsors.ID");

foreach($rows as $row) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["companyName"]."</td></tr>";
}


?>

<a href="attendeeMain.php"> Back </a>
</table>
</body>
</html> 
