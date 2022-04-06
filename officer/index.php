<?php 
ob_start();
session_start();
require_once '../connection.php';
if(!isset($_SESSION['officer'])){header("Location: login.php"); die();}
$officer = $_SESSION['officer'];
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
	<a href='index.php'>Officer panel</a> 
	<a href='../logout.php'>Logout</a>
	</div>
</div></div>

<div id='content'>
<h1>Front desk officer panel</h1>

<div id='links'>
	<a href='account.php'>My account</a>
	<a href='verifications.php'>Passenger verifications</a>
	<a href='reservations.php'>Ticket reservations</a>
	<a href='cancellations.php'>Cancellation requests</a>
</div>





</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>