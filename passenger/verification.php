<?php 
ob_start();
session_start();
require_once '../connection.php';
if(!isset($_SESSION['passenger'])){header("Location: login.php"); die();}
$passenger = $_SESSION['passenger'];
?>
<html>
<head>
<link rel='stylesheet' href='../style.css'>
<title>Railway E-Ticket Reservation System</title>
</head>
<body>

<div id='header'><div id='wrap'>
	<div id='top'><a href='../index.php'>Railway E-Ticket Reservation System</a></div>
	<div id='bottom'>
	<a href='index.php'>Passenger panel</a> 
	<a href='../logout.php'>Logout</a>
	</div>
</div></div>

<div id='content'>
<h1>Passenger panel</h1>

<div id='links'>
<?php 
$sql = mysqli_query($con, "SELECT * FROM `passengers` WHERE `id`=".$passenger['id']."");
$row = mysqli_fetch_assoc($sql);
if($row['status'] == 0){
echo "<h3>Your account is not verified</h3>";
echo "<a href='../forms/verificationrequest.php?id=".$row['id']."'><button class='button'>send verification request</button></a>";
}elseif($row['status'] == 1){
echo "<h3>Verification request sent!</h3>";
echo "<p>Your verification is being processed. Please wait.</p>";

}elseif($row['status'] == 2){
echo "<h3>Account verified!</h3>";
echo "<p>Your account is verified.</p>";

}elseif($row['status'] == 3){
echo "<h3>Verification request rejected!</h3>";
echo "<p>Your verification request is rejected.</p>";


}
?>
</div>



</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>