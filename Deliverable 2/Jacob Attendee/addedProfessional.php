<!DOCTYPE html>

<html>

<head>

<link href="firstPage.css" type="text/css" rel="stylesheet" >

</head>

<body>

<h2>Student Information</h2>

<?php

$fName = $_POST['firstname'];
$lName = $_POST['lastname'];
$jobName = $_POST['jobtitle'];
$attendeeFee = 100;

echo $fName;
echo "<br>";

echo $lName;
echo "<br>";

echo $jobName;
echo "<br>";


#connect to the database

$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "insert into Attendees (firstName, lastName, fee) values (?, ?, ?);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$fName, $lName, $attendeeFee]);   #bind the parameters

$sql = "select ID from Attendees where firstName = ? and lastName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$fName, $lName]);

$row2 = $stmt->fetch();
echo $row2["ID"];

$sql2 = "insert into professionals (jobTitle, ID) values (?, ?);";
$stmt2 = $pdo->prepare($sql2);   #create the query
$stmt2->execute([$jobName, $row2["ID"]]);   #bind the parameters

?>
<br>
<br>
<a href="index1.php"> Home </a> <br>

</body>
</html> 

