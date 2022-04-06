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

<table class='table'>
	<tr>
		<th colspan='3' class='center'>Passengers accounts</th>
	</tr>
	<tr>
		<th>Details</th>
		<th>Signup</th>
		<th>Action</th>
	</tr>
	<?php 
	$sql = mysqli_query($con, "SELECT * FROM `passengers` ORDER BY `id` DESC");
	if(mysqli_num_rows($sql) > 0){
	while($row = mysqli_fetch_assoc($sql)){
	?>
		<tr>
			<td>
				<h3><?=$row['fullname']?></h3>
				<b>Email:</b> <?=$row['email']?><br><br>
				<b>Mobile No:</b> <?=$row['phone']?><br><br>
				<b>CNIC No:</b> <?=$row['cnic']?><br><br>
				<b>Nearest station:</b> <?=$row['nearest']?>
			</td>
			<td><?=$row['time']?></td>
			<td>
				<a href="../forms/deletepassenger.php?id=<?=$row['id']?>"><button class="delbutton">delete</button></a>
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