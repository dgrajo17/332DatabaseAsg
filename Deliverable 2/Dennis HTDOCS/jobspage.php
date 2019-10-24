<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h2>Job Information</h2>


<form action="jobspage.php" method="post">
	<p>
	Please select the company you want to see jobs for.
	<select name ="formCompanyJobs">
		<option value ="">Select Company</option>
		<option value ="all">All companies</option>
		<option value ="Clarke Pub">Clarke Pub</option>
		<option value ="Deloitte">Deloitte</option>
		<option value ="Faskens">Faskens</option>
	</select>
	</p>
	<input type="submit">

</form>


<?php
if(isset($_POST['formCompanyJobs']))
{
$company = $_POST['formCompanyJobs'];
switch($company)
{
 case "all": $redir = "alljobs.php"; header("Location: $redir"); break;
 case "": $redir = "alljobs.php"; header("Location: $redir"); break; 
 default: break;
}
}

echo "<h3>Listed are the jobs available for $company</h3>";

echo "<table><tr><th>Job Title</th><th>Province</th><th>City</th><th>Pay Per Hour ($)</th></tr>";

$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "select jobTitle, province, city, payRate from jobads where companyName = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$company]);

while ($row = $stmt->fetch()) {
	echo "<tr><td>".$row["jobTitle"]."</td><td>".$row["province"]."</td><td>".$row["city"]."</td><td>".$row["payRate"]."</td></tr>";
}

?>

<a href="index1.php"> Home </a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</table>
</body>
</html> 
