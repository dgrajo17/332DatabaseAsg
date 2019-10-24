<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Student Information</h2>


<?php

echo "<table><tr><th>Name</th><th>School</th><th>Program</th><th>Room Number</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("insert into Students values(1000,'Queens', 'Eng',201)");

foreach($rows as $row) {
	echo "<tr><td>".$row["ID"]."</td><td>".$row["schoolName"]."</td><td>".$row["program"]."</td><td>".$row["roomNumber"]."</td></tr>";
}


?>
</table>
</body>
</html> 
