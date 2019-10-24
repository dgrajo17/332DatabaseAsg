<!DOCTYPE html>

<html>

<head>

<link href="firstPage.css" type="text/css" rel="stylesheet" >

</head>

<body>

<h2>Sponsor Information</h2>

<?php

$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$compName = $_POST['companyName'];
$attendeeFee = 0;

echo $fName;
echo "<br>";

echo $lName;
echo "<br>";

echo $compName;
echo "<br>";


#connect to the database

$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

#inserts into attendeees
$sql = "insert into Attendees (firstName, lastName, fee) values (?, ?, ?);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$fName, $lName, $attendeeFee]);   #bind the parameters

#gets the id from attendees
$sql = "select ID from Attendees where firstName = ? and lastName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$fName, $lName]);
$row2 = $stmt->fetch();
echo $row2["ID"];

#finds out if the company is already in the database
$sql = "select count(companyName) as compExists from Company where companyName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$compName]);

$isCompany = $stmt->fetch();
echo("<br>");
echo $isCompany["compExists"];
echo("<br>");

#adds the company to the database if it isn't already in there
if($isCompany["compExists"] == '0')
{
	$sql2 = "insert into Company (companyName, sponsorLevel, maxEmails, emailsSent) values (?, ?, ?, ?);";
	$stmt2 = $pdo->prepare($sql2);   #create the query
	$stmt2->execute([$compName, "Bronze", 0, 0]);   #bind the parameters
}

$sql2 = "insert into Sponsors (companyName, ID) values (?, ?);";
$stmt2 = $pdo->prepare($sql2);   #create the query
$stmt2->execute([$compName, $row2["ID"]]);   #bind the parameters
?>
<br>
<br>
<a href="index1.php"> Home </a> <br>

</body>
</html> 

