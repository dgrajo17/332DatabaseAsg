<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Sub-Committee Information</h2>

<form action="subcomdrop.php" method="post">
	<p>
	Display sub-committee?
	<select name ="formSubCom">
		<option value ="">Select Sub-Comittee</option>
		<option value ="Ticket Entrance Committee">Ticket Entrance</option>
		<option value ="Advertisement Committee">Advertisement</option>
		<option value ="Budget Committee">Budget</option>
	</select>
	</p>
	<input type="submit">
</form>


<?php



echo "<table><tr><th>Committee Name</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select committeeName from committees");

foreach($rows as $row) {
	echo "<tr><td>".$row["committeeName"]."</td></tr>";
}


?>

<a href="index1.php"> Home </a>

</table>
</body>
</html> 
