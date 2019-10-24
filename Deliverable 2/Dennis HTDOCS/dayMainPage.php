<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Conference Schedule by Day</h2>

<form action="dayschedule.php" method="post">
	<p>
	Please select the day that you want to see the schedule for.
	<select name ="formDaySched">
		<option value ="">Select Day</option>
		<option value ="1">Day 1</option>
		<option value ="2">Day 2</option>
		<option value ="3">Day 3</option>
		<option value ="all">All days</option>
	</select>
	</p>
	<input type="submit">
</form>

<a href="index1.php"> Home </a>


<?php
echo "<h3>Schedule for all days</h3>";

echo "<table><tr><th>First Name</th><th>Last Name</th><th>Session</th><th>Start</th><th>End</th><th>Room</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select firstName, lastName, sessionName, startTime, endTime, roomLocation from attendees, speaks, sessions where attendees.ID = speaks.speakerID and speaks.sessionID = sessions.sessionID");


foreach ($rows as $row) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["sessionName"]."</td><td>".$row["startTime"]."</td><td>".$row["endTime"]."</td><td>".$row["roomLocation"]."</td></tr>";
}
?>

</table>
</body>
</html> 
