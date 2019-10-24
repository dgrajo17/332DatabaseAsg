<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Student Information</h2>


<?php

echo "<table><tr><th>First Name</th><th>Last Name</th><th>School</th><th>Program</th><th>Room Number</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select firstName, lastName, schoolName, program, roomNumber from attendees, students where attendees.ID = students.ID");

foreach($rows as $row) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["schoolName"]."</td><td>".$row["program"]."</td><td>".$row["roomNumber"]."</td></tr>";
}


?>

<a href="attendeeMain.php"> Back </a>

</table>
</body>
</html> 
