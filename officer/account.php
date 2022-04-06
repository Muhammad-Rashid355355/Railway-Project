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

<table class='table'>
	<tr>
		<th colspan='2' style='text-align: center;'>My account</th>
	</tr>
	<tr>
		<td style='width: 50%;'>Full name:</td>
		<td><?=$officer['fullname']?></td>
	</tr>
	<tr>
		<td>Username:</td>
		<td><?=$officer['username']?></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><?=$officer['email']?></td>
	</tr>
	<tr>
		<td>Phone:</td>
		<td><?=$officer['phone']?></td>
	</tr>
	<tr>
		<td>Gender:</td>
		<td><?=$officer['gender']?></td>
	</tr>	
		<tr>
		<td>Address:</td>
		<td><?=$officer['address']?></td>
	</tr>
	<tr>
		<td>Signup:</td>
		<td><?=$officer['time']?></td>
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