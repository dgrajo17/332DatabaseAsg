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
		<option value ="Back">List of Sub-Committees</option>
		<option value ="Ticket Entrance Committee">Ticket Entrance</option>
		<option value ="Advertisement Committee">Advertisement</option>
		<option value ="Budget Committee">Budget</option>
	</select>
	</p>
	<input type="submit">
</form>

<?php
if(isset($_POST['formSubCom']))
{
$subCommittee = $_POST['formSubCom'];
switch($subCommittee)
{
 case "Back": $redir = "subcomfullpage.php"; header("Location: $redir"); break;
 case "": $redir = "subcomfullpage.php"; header("Location: $redir"); break;
 default: break;
}
}

echo "<h3>$subCommittee</h3>";

echo "<table><tr><th>First Name</th><th>Last Name</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "select firstName, lastName from committeemembers where ID in (select memberID from memberoncommittee where committeeID in (select committeeID from committees where committeeName = ?))";
$stmt = $pdo->prepare($sql);
$stmt->execute([$subCommittee]);

while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["firstName"]."</td><td>".$row["lastName"]."</td></tr>";
}
?>

<a href="index1.php"> Home </a>

</table>
</body>
</html> 
