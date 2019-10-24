<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Add Sponsoring Company</h2>


<?php
$addedCompanyName = $_POST["addName"]; 
if(isset($_POST['formLevel']))
{
$sponsorLevel = $_POST['formLevel'];
switch($sponsorLevel)
{
 case "Bronze": $maxEmails = 0; break;
 case "Silver": $maxEmails = 3; break;
 case "Gold": $maxEmails = 4; break;
 case "Platinum": $maxEmails = 5; break;
 default: break;
}
}

echo "<p> $addedCompanyName </p>";

echo "<table><tr><th>Company</th><th>Sponsor Level</th><th>Max Emails</th><th>Emails Sent</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "insert into company (companyName, sponsorLevel, maxEmails, emailsSent) values (?, ?, ?, 0);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$addedCompanyName, $sponsorLevel, $maxEmails]);   #bind the parameters



#stmt contains the result of the program execution
#use fetch to get results row by row.
$rows = $pdo->query("select * from company");

foreach($rows as $row) {
	echo "<tr><td>".$row["companyName"]."</td><td>".$row["sponsorLevel"]."</td><td>".$row["maxEmails"]."</td><td>".$row["emailsSent"]."</td></tr>";
}


?>

<a href="companyMainPage.php"> Back </a>

</table>
</body>
</html> 
