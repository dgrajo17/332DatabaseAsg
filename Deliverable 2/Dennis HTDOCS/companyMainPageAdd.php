<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<span class="navbar-brand mb-0 h1">Group 69's Database</span>

	<div class="collapse navbar-collapse" id="navbarNav">
		<div class="navbar-nav">
			<a class="nav-item nav-link active" href="index1.php">Home<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="companyMainPage.php">Company<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="alljobs.php">Jobs<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="sponsors.php">Sponsors<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="attendeeMain.php">Attendees<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="dayMainPage.php">Day Info<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="hotel.php">Hotel<span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link active" href="totalintake.php">Intake<span class="sr-only">(current)</span></a>
		</div>
	</div>
</nav>

<body>


<div class ="container">

<h2>Company Information</h2>
<form action="companyMainPageAdd.php" method="post">
	<div class="row">
	<div class ="form-group col-md-4 align-items-center">
		<label for="addName">Name:</label>
		<input type="text" class="form-control" name="addName" placeholder="Company Name">
	</div>
	<div class="col-4" class="form-group">
		<label for="formLevel">What is the company's sponsor level?</label>
		<select class="form-control" name ="formLevel" width: 50%>
			<option value ="">Select sponsor level</option>
			<option value ="Bronze">Bronze</option>
			<option value ="Silver">Silver</option>
			<option value ="Gold">Gold</option>
			<option value ="Platinum">Platinum</option>
		</select>
	</div>
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form> 

<form action="companyMainPageDelete.php" method="post">
<div class="row">
	<div class ="form-group col-md-4" >
	<label for="formDelComp">Please write the name of the sponsoring company to delete. </label>
	<input type="text" class="form-control" name="formDelComp" placeholder="Company Name">
	</div>
</div>
	<button type="submit" class="btn btn-primary">Submit</button>

</form>

<a href="index1.php"> Home </a>

<?php
#----------------------
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


echo "<table><tr><th>Company</th><th>Sponsor Level</th><th>Max Emails</th><th>Emails Sent</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$sql = "insert into company (companyName, sponsorLevel, maxEmails, emailsSent) values (?, ?, ?, 0);";
$stmt = $pdo->prepare($sql);   #create the query
$stmt->execute([$addedCompanyName, $sponsorLevel, $maxEmails]);   #bind the parameters


$rows = $pdo->query("select * from company");

foreach($rows as $row) {
	echo "<tr><td>".$row["companyName"]."</td><td>".$row["sponsorLevel"]."</td><td>".$row["maxEmails"]."</td><td>".$row["emailsSent"]."</td></tr>";
}


?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</table>
</div>
</body>
</html> 
