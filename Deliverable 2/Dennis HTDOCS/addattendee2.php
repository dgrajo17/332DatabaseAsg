<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Add Attendee</h2>


<?php
$fName = $_POST["givenName"]; 
$lName = $_POST["surName"];
if(isset($_POST['formAttendees']))
{
$attendeeType = $_POST['formAttendees'];
switch($attendeeType)
{
 case "students": $redir = "addStudent.php"; $attendeeFee = 50; break;
 case "professionals": $attendeeFee = 100; break;
 case "sponsors": $attendeeFee = 0; break;
 default: break;
}
}


echo "<p> $fName $lName </p>";

echo "<table><tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Fee</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "insert into Attendees (firstName, lastName, fee) values (?, ?, ?);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$fName, $lName, $attendeeFee]);   #bind the parameters



#stmt contains the result of the program execution
#use fetch to get results row by row.
$rows = $pdo->query("select ID, firstName, lastName, fee from attendees");

foreach($rows as $row) {
	echo "<tr><td>".$row["ID"]."</td><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td><td>".$row["fee"]."</td></tr>";
}

?>

<a href="attendeeMain.php"> Back </a> <br>
</table>
</body>
</html> 
