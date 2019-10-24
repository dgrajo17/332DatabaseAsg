<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>

<h2>Edit Session:</h2>

<a href="index1.php"> Home </a>

<form action="editedSession.php" method="post">
	<p>
	Please select the session that you want to edit.
	<select name ="sesnName">
		<option value ="">Select Session</option>
		<option value ="Understanding Nature">Understanding Nature</option>
		<option value ="Understanding Finance">Understanding Finance</option>
		<option value ="Understanding You">Understanding You</option>
		<option value ="Using Knowledge">Using Knowledge</option>
		<option value ="Implementing Skills">Implementing Skills</option>
	</select>
	</p>
	<p>Please enter the new location of the session:</p>
	<input type = "text" name = "sesnLocation">
	<p> Start Time: </p>
	<input type = "text" name = "startTime">
	<br>
	<p> End Time </p>
	<input type = "text" name = "endTime">
	<br>
	<input type="submit">
</form>


<?php
if(isset($_POST['boolean']))
{
$bool = $_POST['boolean'];
switch($bool) {
 case "no": $redir = "dayMainPage.php"; header("Location: $redir"); break;
 default: break;
}
}
?>



<?php
if(isset($_POST['sesnName']))
{
$session = $_POST['sesnName'];
switch($session) {
 case "": $redir = "dayMainPage.php"; header("Location: $redir"); break;
 default: break;
}
}
?>




</body>
</html> 
