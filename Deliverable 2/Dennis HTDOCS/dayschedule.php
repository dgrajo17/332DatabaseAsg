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

<?php
if(isset($_POST['formDaySched']))
{
$dayNum = $_POST['formDaySched'];
switch($dayNum) {
 case "all": $redir = "dayAll.php"; header("Location: $redir"); break;
 case "": $redir = "dayMainPage.php"; header("Location: $redir"); break;
 default: break;
}
}

echo "<h3>Schedule for Day $dayNum</h3>";

echo "<table><tr><th>First Name</th><th>Last Name</th><th>Session</th><th>Start</th><th>End</th><th>Room</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "select firstName, lastName, sessionName, startTime, endTime, roomLocation from attendees, speaks, sessions where attendees.ID = speaks.speakerID and speaks.sessionID = sessions.sessionID and day = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$dayNum]);

while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["sessionName"]."</td><td>".$row["startTime"]."</td><td>".$row["endTime"]."</td><td>".$row["roomLocation"]."</td></tr>";
}
?>

<a href="index1.php"> Home </a>

</table>
</body>
</html> 
