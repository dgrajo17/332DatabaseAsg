<!DOCTYPE html>
<html>
<head>
<link href="firstPage.css" type="text/css" rel="stylesheet" >
</head>
<body>
<h2>Attendee Information</h2>


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
</table>
</body>
</html> 
