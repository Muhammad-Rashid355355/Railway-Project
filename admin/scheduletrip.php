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


			<form method='post' action='../forms/scheduletrip.php'>
			<table class='form'>
			<tr>
				<td>Trip type</td>
				<td>
					<select name='ttype' required>
						<option value=''>--select--</option>
						<option value='Round/single trip'>Round/single trip</option>
						<option value='Tourism trip'>Tourism trip</option>
						<option value='Long trip'>Long trip</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Train:</td>
				<td>
					<select name='train' required>
						<option value=''>--select--</option>
						<?php 
						$sql = mysqli_query($con, "SELECT * FROM `trains` ORDER BY `number` ASC");
						if(mysqli_num_rows($sql) > 0){
						while($row = mysqli_fetch_assoc($sql)){
						echo "<option value='".$row['id']."'>".$row['number']."</option>";
						}}
						?>
					</select>
				</td>
			</tr>
            <tr>
				<td>Route:</td>
				<td>
					<select name='route' required>
						<option value=''>--select--</option>
						<?php 
						$sql2 = mysqli_query($con, "SELECT * FROM `routes` ORDER BY `arrival` ASC");
						if(mysqli_num_rows($sql2) > 0){
						while($row2 = mysqli_fetch_assoc($sql2)){
						echo "<option value='".$row2['id']."'>".$row2['arrival']."-".$row2['departure']." (".$row2['tfrom']."-".$row2['tto'].")</option>";
						}}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Date:</td>
				<td><input type='date' name='date' required></td>
			</tr>
			

			
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Schedule trip ' ></td>
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