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
	<a href='account.php'>My account</a>
	<a href='verification.php'>Account verification</a>
	<a href='bookticket.php'>Book E-ticket</a>
	<a href='orderhistory.php'>Order history</a>
	<a href='confirmedorders.php'>Confirmed orders</a>
	<a href='cancelledorders.php'>Cancelled orders</a>
    <a href='printorders.php'>Print orders</a>
</div>





</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>