<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Employee Information</h2>


<?php
$inputName = $_POST["givenName"]; 
if(isset($_POST['formAttendees']))
{
$attendeeType = $_POST['formAttendees'];
switch($attendeeType)
{
 case "students": $redir = "addStudent.php"; break;
 case "professionals": $redir = "addProfessional.php"; break;
 case "sponsors": $redir = "addSponsor.php"; break;
 default: break;
}
}


                     
echo "<h3>Hello $givenName $surname</h3>";
echo "<p>I see you are in the $dept department.</p>";

echo "<p>Here is a list of all the professors at the university and their salaries!</p>";

echo "<table><tr><th>Name</th><th>Salary</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "select name, salary from instructor where dept_name = ?";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$dept]);   #bind the parameters

#stmt contains the result of the program execution
#use fetch to get results row by row.
while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["name"]."</td><td>".$row["salary"]."</td></tr>";
}


header("Location: $redir"); 


?>
</table>
</body>
</html> 
