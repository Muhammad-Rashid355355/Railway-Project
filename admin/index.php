<?php 
ob_start();
session_start();
require_once '../connection.php';
if(!isset($_SESSION['admin'])){header("Location: login.php"); die();}
$admin = $_SESSION['admin'];
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
	<a href='index.php'>Admin panel</a> 
	<a href='../logout.php'>Logout</a>
	</div>
</div></div>

<div id='content'>
<h1>Admin panel</h1>

<div id='links'>
	<a href='trains.php'>Trains</a>
	<a href='routes.php'>Routes</a>
	<a href='trips.php'>Trips</a>
    <a href='officers.php'>Front desk officers</a>
	<a href='passengers.php'>Passengers</a>
</div>





</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>