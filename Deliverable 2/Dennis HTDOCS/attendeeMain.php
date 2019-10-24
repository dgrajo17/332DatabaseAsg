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
<div class="container>
<h2>Attendee Information</h2>

<form action="attendeesList.php" method="post">
	<p>
	Please select which demographic you wish to view.
	<select name ="formAttendees">
		<option value ="">Select attendee type</option>
		<option value ="students">Student</option>
		<option value ="professionals">Professional</option>
		<option value ="sponsors">Sponsor</option>
	</select>
	</p>
	<input type="submit">
</form>

<form action="addattendee2.php" method="post">
<p>First Name:</p>
<input type="text" name="givenName">
<p>Last Name:</p>
<input type="text" name="surName">
<br>
	Attendee Type.
	<select name ="formAttendees">
		<option value ="">Select attendee type</option>
		<option value ="students">Student</option>
		<option value ="professionals">Professional</option>
		<option value ="sponsors">Sponsor</option>
	</select>
</p>
<input type="submit">
</form> 

<?php
if(isset($_POST['formAttendees']))
{
$attendeeType = $_POST['formAttendees'];
switch($attendeeType)
{
 case "students": $redir = "studentphp.php"; break;
 case "professionals": $redir = "professionalphp.php"; break;
 case "sponsors": $redir = "sponsorphp.php"; break;
default: echo("Error!"); exit(); break;
}
echo "Redirecting to $redir";
header("Location: $redir");
exit();
}
?>

<a href="index1.php"> Home </a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</table>
</div>
</body>
</html> 
