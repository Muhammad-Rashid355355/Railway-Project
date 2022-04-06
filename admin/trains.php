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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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


<a href='TrainAddform.php'><button type="button" class="btn btn-success"  >Add train</button></a>


<table class='table'>
	<tr>
		<th colspan='3' class='center'>Trains</th>
	</tr>
	<tr>
		<th>Details</th>
		<th>Photos</th>
		<th>Action</th>
	</tr>
	<?php
     
$sql = mysqli_query($con, "SELECT * FROM `trains` ORDER BY `id` DESC");
if(mysqli_num_rows($sql) > 0){
while($row = mysqli_fetch_assoc($sql)){
$imgs = '';
$sql2 = mysqli_query($con, "SELECT * FROM `trainsphotos` WHERE `train`=".$row['id']."");
while($row2 = mysqli_fetch_assoc($sql2)){
$imgs .= "<img src='../uploads/".$row2['photo']."'>";
}
?>
<tr>
	<td>
		<b>Train number:</b> <?=$row['number']?><br><br>
		<b>Total seats:</b> <?=$row['seats']?>
	</td>
	<td class='imgs'style='width: 50%;'><?=$imgs?></td>
	<td><a href="../forms/deletetrain.php?id=<?=$row['id']?>"><button class="delbutton">Delete</button></a></td>
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