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


			<form method='post' action='../forms/addtrain.php' enctype='multipart/form-data'>
			<table class='form'>
			<tr>
				<td>Train number:<br><small><b>(eg: 123abc)</b></small></td>
				<td><input type='text' name='tn' required></td>
			</tr>

			<tr>
				<td>Total seats:</td>
				<td><input type='number' name='ts' required></td>
			</tr>
			
			<tr>
				<td>Upload train photos:</td>
				<td><input type='file' name='tp[]' multiple required></td>
			</tr>
			
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Add train' ></td>
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