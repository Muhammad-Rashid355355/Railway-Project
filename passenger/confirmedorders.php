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
		<th class='center' colspan='3'>Confirmed orders</th>
	</tr>
	<tr>
		<th>Trip</th>
		<th>Train</th>
		<th>Ticket<br>fare</th>
	</tr>
	<?php 
	$bsql = mysqli_query($con, "SELECT * FROM `bookings` WHERE `passenger`=".$passenger['id']." AND (`status`=1 OR `status`=2)  ORDER BY `id` DESC");
	if(mysqli_num_rows($bsql) > 0){
	while($brow = mysqli_fetch_assoc($bsql)){
	$sql = mysqli_query($con, "SELECT * FROM `trips` WHERE `id`=".$brow['trip']."");
	$row = mysqli_fetch_assoc($sql);
	
	$sql2 = mysqli_query($con, "SELECT * FROM `trains` WHERE id=".$row['train']."");
	$row2 = mysqli_fetch_assoc($sql2);
	$imgs = '';
	$sql3 = mysqli_query($con, "SELECT * FROM `trainsphotos` WHERE train=".$row2['id']."");
	while($row3 = mysqli_fetch_assoc($sql3)){
	$imgs .= "<img src='../uploads/".$row3['photo']."'>";
	}
	$sql4 = mysqli_query($con, "SELECT * FROM `routes` WHERE id=".$row['route']."");
	$row4 = mysqli_fetch_assoc($sql4);

	?>
	<tr>
		<td style='width: 30%;'>
			<b>Trip type:</b> <?=$row['ttype']?><br><br>
			<b>Arrival:</b> <?=$row4['arrival']?><br><br>
			<b>Departure:</b> <?=$row4['departure']?><br><br>
			<b>Date:</b> <?=$row['date']?><br><br>
			<b>Time:</b> <?=$row4['tfrom']?> - <?=$row4['tto']?>
		</td>
		<td class='imgs' style='width: 40%;'>
			<b>Train number:</b> <?=$row2['number']?><br><br>
			<b>Total seats:</b> <?=$row2['seats']?><br><br>
			<?=$imgs?>
		</td>
		<td>
			<?=number_format($row4['tfare'], 2)?><br><br>
			<b>Your seat No:</b> <?=$brow['seat']?><br><br>
			<b>Booking time:</b> <?=$brow['time']?>

		</td>

	</tr>
	<?php
	}}
	?>
</table>




</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>