<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>

<h2>Edited Session:</h2>

<a href="index1.php"> Home </a>



<?php
	$startTime = $_POST['startTime'];
	$location = $_POST['sesnLocation'];
	$endTime = $_POST['endTime'];
	$session = $_POST['sesnName'];
		
	#connect to the database
	$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

	$sql = "update Sessions set startTime = ?, endTime = ?, roomLocation = ? where sessionName = ?";
	$stmt = $pdo->prepare($sql);   #create the query
	$stmt->execute([$startTime,$endTime,$location,$session]);   #bind the parameters
	
	echo "<h3>New Session Times</h3>";

	echo "<table><tr><th>First Name</th><th>Last Name</th><th>Session</th><th>Start</th><th>End</th><th>Room</th></tr>";
	
	$sql2 = "select firstName, lastName, sessionName, startTime, endTime, roomLocation from Attendees, Speaks, Sessions where Attendees.ID = Speaks.speakerID and Speaks.sessionID = Sessions.sessionID and Sessions.sessionName = ?";
	$stmt2 = $pdo->prepare($sql2);
	$stmt2->execute([$session]);
	
	while ($row = $stmt2->fetch()) {
		echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["sessionName"]."</td><td>".$row["startTime"]."</td><td>".$row["endTime"]."</td><td>".$row["roomLocation"]."</td></tr>";
	}

?>