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


			<form method='post' action='../forms/addroute.php'>
			<table class='form'>
			<tr>
				<td>Arrival:</td>
				<td><input type='text' name='arrival' required></td>
			</tr>

			<tr>
				<td>Departure:</td>
				<td><input type='text' name='departure' required></td>
			</tr>
			
			<tr>
				<td>Ticket fare:</td>
				<td><input type='number' name='tfare' required></td>
			</tr>

			
			<tr>
				<td>Timings:</td>
				<td>
					<b>From:</b><br>
					<input type='time' name='tfrom' required>
					<br><br><b>To:</b><br>
					<input type='time' name='tto' required>
				</td>
			</tr>
			
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Add route' ></td>
			</tr>
			</table>
			</form>



</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>