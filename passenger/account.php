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

<table class='table'>
	<tr>
		<th colspan='2' style='text-align: center;'>My account</th>
	</tr>
	<tr>
		<td style='width: 50%;'>Full name:</td>
		<td><?=$passenger['fullname']?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?=$passenger['email']?></td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><?=$passenger['phone']?></td>
	</tr>
	<tr>
		<td>CNIC No:</td>
		<td><?=$passenger['cnic']?></td>
	</tr>	
	<tr>
		<td>Nearest station:</td>
		<td><?=$passenger['nearest']?></td>
	</tr>
	<tr>
		<td>Signup:</td>
		<td><?=$passenger['time']?></td>
	</tr>
</table>




</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>