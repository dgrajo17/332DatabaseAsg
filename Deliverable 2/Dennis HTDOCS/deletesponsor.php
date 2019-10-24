<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Delete Sponsoring Company</h2>


<?php
$companyDel = $_POST['formDelComp'];

echo "<h3>$companyDel</h3>";

echo "<table><tr><th>Company</th><th>Sponsor Level</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "delete from attendees where attendees.ID in(select ID from sponsors where companyName = ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$companyDel]);

$sql = "delete from company where companyName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$companyDel]);

$rows = $pdo->query("select companyName, sponsorLevel from company");

foreach($rows as $row) {
	echo "<tr><td>".$row["companyName"]."</td><td>".$row["sponsorLevel"]."</td></tr>";
}
?>


<a href="companyMainPage.php"> Back </a>

</table>
</body>
</html> 
