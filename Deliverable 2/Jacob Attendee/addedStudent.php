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
$school = $_POST['schoolname'];
$program = $_POST['programname'];
$attendeeFee = 50;

echo $fName;
echo "<br>";

echo $lName;
echo "<br>";

echo $school;
echo "<br>";

echo $program;
echo "<br>";

#connect to the database

$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "insert into Attendees (firstName, lastName, fee) values (?, ?, ?);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$fName, $lName, $attendeeFee]);   #bind the parameters

//testing adding
$sql = "insert into HotelRoom (numberOfBeds) values (1);";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$sql = "select max(roomNumber) as maxRoom from HotelRoom;";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$row = $stmt->fetch();
echo $row["maxRoom"];
echo ("<br>");

$sql = "select ID from Attendees where firstName = ? and lastName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$fName, $lName]);

$row2 = $stmt->fetch();
echo $row2["ID"];

$sql2 = "insert into students (schoolName, program, ID, roomNumber) values (?, ?, ?, ?);";
$stmt2 = $pdo->prepare($sql2);   #create the query
$stmt2->execute([$school, $program, $row2["ID"], $row["maxRoom"]]);   #bind the parameters

?>
<br>
<br>
<a href="index1.php"> Home </a> <br>

</body>
</html> 

