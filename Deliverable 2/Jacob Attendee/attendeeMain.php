<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
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
<br>
<form action="attendeeBuffer.php" method="post"><!-- 
<p>First Name:</p>
<input type="text" name="givenName">
<p>Last Name:</p>
<input type="text" name="surName">
<br> !--><p> Add Attendee <br> </p>
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

<?phpif(isset($_POST['formAttendees'])){	$attendeeType = $_POST['formAttendees'];	if($attendeeType = "Select attendee type")	{		$redir = "attendeeMain.php";		header("Location: $redir");		exit();	}}/*
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
} */
?>

<a href="index1.php"> Home </a>

</table>
</body>
</html> 
