<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Total Intake</h2>


<?php

echo "<table><tr><th>Type</th><th>Total</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select sum(fee) from attendees");

foreach($rows as $row) {
	echo "<tr><td>"."Registration"."</td><td>".$row["sum(fee)"]."</td></tr>";
}

$rows = $pdo->query("select count(sponsorLevel) from company where sponsorLevel = 'Bronze'");
foreach($rows as $row) {
	$bronzeVal = $row["count(sponsorLevel)"] * 1000;
}

$rows = $pdo->query("select count(sponsorLevel) from company where sponsorLevel = 'Silver'");
foreach($rows as $row) {
	$silverVal = $row["count(sponsorLevel)"] * 3000;
}


$rows = $pdo->query("select count(sponsorLevel) from company where sponsorLevel = 'Gold'");
foreach($rows as $row) {
	$goldVal = $row["count(sponsorLevel)"] * 5000;
}

$rows = $pdo->query("select count(sponsorLevel) from company where sponsorLevel = 'Platinum'");
foreach($rows as $row) {
	$platVal = $row["count(sponsorLevel)"] * 10000;
}

$totalSponsorVal = $bronzeVal + $silverVal + $goldVal + $platVal;

echo "<tr><td>"."Sponsorship"."</td><td>".$totalSponsorVal."</td></tr>";

?>

<a href="index1.php"> Home </a>

</table>
</body>
</html> 
