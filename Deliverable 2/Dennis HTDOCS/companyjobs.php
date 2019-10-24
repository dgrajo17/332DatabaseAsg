<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Job Information</h2>


<?php
if(isset($_POST['formCompanyJobs']))
{
$company = $_POST['formCompanyJobs'];
}

echo "<h3>Listed are the jobs available for $company</h3>";

echo "<table><tr><th>Job Title</th><th>Province</th><th>City</th><th>Pay Per Hour ($)</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "select jobTitle, province, city, payRate from jobads where companyName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$company]);

while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["jobTitle"]."</td><td>".$row["province"]."</td><td>".$row["city"]."</td><td>".$row["payRate"]."</td></tr>";
}
?>
</table>
</body>
</html> 
