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
		<th class='center' colspan='4'>Book E-ticket</th>
	</tr>
	<tr>
		<th>Trip</th>
		<th>Train</th>
		<th>Ticket<br>fare</th>
		<th>Action</th>
	</tr>
	<?php 
	$sql = mysqli_query($con, "SELECT * FROM `trips` WHERE `date2`>".time()." ORDER BY `id` DESC");
	if(mysqli_num_rows($sql) > 0){
	while($row = mysqli_fetch_assoc($sql)){
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
		<td>
			<b>Trip type:</b> <?=$row['ttype']?><br><br>
			<b>Arrival:</b> <?=$row4['arrival']?><br><br>
			<b>Departure:</b> <?=$row4['departure']?><br><br>
			<b>Date:</b> <?=$row['date']?><br><br>
			<b>Time:</b> <?=$row4['tfrom']?> - <?=$row4['tto']?>
		</td>
		<td class='imgs' style='width: 50%;'>
			<b>Train number:</b> <?=$row2['number']?><br><br>
			<b>Total seats:</b> <?=$row2['seats']?><br><br>
			<?=$imgs?>
		</td>
		<td><?=number_format($row4['tfare'], 2)?></td>
		<td><a href="payticket.php?id=<?=$row['id']?>"><button>book ticket</button></a></td>
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