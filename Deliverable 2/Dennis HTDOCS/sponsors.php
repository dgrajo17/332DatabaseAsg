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
<div class="container">
<h2>Sponsorship Information</h2>


<?php

echo "<table><tr><th>Company</th><th>Level</th></tr>";

#connect to the database
$pdo = new PDO('mysql:host=localhost;dbname=Conference', "root", "");

$rows = $pdo->query("select companyName, sponsorLevel from company");

foreach($rows as $row) {
	echo "<tr><td>".$row["companyName"]."</td><td>".$row["sponsorLevel"]."</td></tr>";
}


?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</table>
</div>
</body>
</html> 
