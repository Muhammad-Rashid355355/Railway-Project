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
<style>
.buttons{
	width: 100px;
	height: 40px;
	border-radius: 5px;
	background-color: #DBF9FC;
	box-shadow: rgba(50, 115, 220, 0.3) 5px 3px ;

}
.delbutton{
	width: 70px;
	height: 40px ;
	background-color: #008CBA;;
	border-radius: 5px;
}

</style>
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

<a href='addsheduletrip.php'><button class="buttons">Schedule trip</button></a>

<table class='table'>
	<tr>
		<th colspan='6' class='center'>Train trips schedule</th>
	</tr>
	<tr>
		<th>Date & time</th>
		<th>Trip <br>type</th>
		<th>Train</th>
		<th>Route</th>
		<th>Ticket<br>fare</th>
		<th>Action</th>
	</tr>
<?php
     
$sql = mysqli_query($con, "SELECT * FROM `trips` ORDER BY `id` DESC");
if(mysqli_num_rows($sql) > 0){
while($row = mysqli_fetch_assoc($sql)){
$sql2 = mysqli_query($con, "SELECT * FROM `trains` WHERE `id`=".$row['train']."");
$row2 = mysqli_fetch_assoc($sql2);
$sql3 = mysqli_query($con, "SELECT * FROM `routes` WHERE `id`=".$row['route']."");
$row3 = mysqli_fetch_assoc($sql3);
?>
<tr>
	<td>
		<b>Date:</b> <?=$row['date']?><br>
		<b>Time:</b> <?=$row3['tfrom']?> - <?=$row3['tto']?>
	</td>
	<td><?=$row['ttype']?></td>
	<td>
		<b>Number:</b> <?=$row2['number']?><br>
		<b>Seats:</b> <?=$row2['seats']?>
	</td>
	<td>
		<b>Arrival:</b> <?=$row3['arrival']?><br>
		<b>Departure:</b> <?=$row3['departure']?>
	</td>
	<td><?=number_format($row3['tfare'], 2)?></td>
	<td><a href="../forms/deletetrip.php?id=<?=$row['id']?>"><button class="delbutton">delete</button></a></td>
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