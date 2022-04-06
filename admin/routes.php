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
#buttons{
	width: 150px;
	height: 40px;
	border-radius: 5px;
	background:  linear-gradient(45deg, greenyellow, dodgerblue) !important;
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

<a href='addTrainRoutes.php' ><button class='button'id="buttons" >Add route</button></a>

<table class='table'>
	<tr>
		<th colspan='5' class='center'>Train routes</th>
	</tr>
	<tr>
		<th>Arrival</th>
		<th>Departure</th>
		<th>Ticket<br>fare</th>
		<th>Timing</th>
		<th>Action</th>
	</tr>
	<?php
     
$sql = mysqli_query($con, "SELECT * FROM `routes` ORDER BY `id` DESC");
if(mysqli_num_rows($sql) > 0){
while($row = mysqli_fetch_assoc($sql)){
?>
<tr>
	<td><?=$row['arrival']?></td>
	<td><?=$row['departure']?></td>
	<td><?=number_format($row['tfare'], 2)?></td>
	<td>
	    <b>From:</b> <?=$row['tfrom']?><br>
	    <b>To:</b> <?=$row['tto']?>
	</td>
	<td><a href="../forms/deleteroute.php?id=<?=$row['id']?>"><button class="delbutton">Delete</button></a></td>
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