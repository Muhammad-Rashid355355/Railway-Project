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
	<th class='center' colspan='4'>Ticket reservations</th>
</tr>
<tr>
	<th>Passenger</th>
	<th>Trip</th>
	<th>Train</th>
	<th>Status</th>
</tr>

<?php 
$sql = mysqli_query($con, "SELECT * FROM `bookings` WHERE `status`<>3 AND `status`<>4 ORDER BY `id` DESC");
if(mysqli_num_rows($sql) > 0){
while($row = mysqli_fetch_assoc($sql)){
	$sql2 = mysqli_query($con, "SELECT * FROM `trips` WHERE `id`=".$row['trip']."");
	$row2 = mysqli_fetch_assoc($sql2);
	
	$sql3 = mysqli_query($con, "SELECT * FROM `trains` WHERE id=".$row2['train']."");
	$row3 = mysqli_fetch_assoc($sql3);

	$sql4 = mysqli_query($con, "SELECT * FROM `routes` WHERE id=".$row2['route']."");
	$row4 = mysqli_fetch_assoc($sql4);
	$sql5 = mysqli_query($con, "SELECT * FROM `passengers` WHERE id=".$row['passenger']."");
	$row5 = mysqli_fetch_assoc($sql5);


?>
<tr>
	<td>
		<b>Name:</b> <?=$row5['fullname']?><br><br>
		<b>Email:</b> <?=$row5['email']?><br><br>
		<b>Mobile No:</b> <?=$row5['phone']?><br><br>
		<b>CNIC:</b> <?=$row5['cnic']?><br><br>
		<b>Nearest station:</b> <?=$row5['nearest']?>
	</td>
	<td>
		<b>Trip type:</b> <?=$row2['ttype']?><br><br>
		<b>Arrival:</b> <?=$row4['arrival']?><br><br>
		<b>Departure:</b> <?=$row4['departure']?><br><br>
		<b>Date:</b> <?=$row2['date']?><br><br>
		<b>Time:</b> <?=$row4['tfrom']?> - <?=$row4['tto']?>
	</td>
	<td>
		<b>Train number:</b> <?=$row3['number']?><br><br>
		<b>Total seats:</b> <?=$row3['seats']?><br><br>
		<b>Ticket fare:</b> <?=number_format($row4['tfare'], 2)?><br><br>
		<b>Passenger seat:</b> <?=$row['seat']?><br><br>
		<b>Booking time:</b> <?=$row['time']?>
	 </td>
     <td>
		<?php 
		
		if($row['status'] == 0){
		echo "<b>Awaiting confirmation</b><br><br>";
		echo "<a href='../forms/confirmticket.php?id=".$row['id']."'><button>Confirm ticket</button></a>";
		
		}elseif($row['status'] == 1){
		echo "<b>TICKET PURCHASE CONFIRMED</b><br><br>";
		
		if($row2['ttype'] == 'Tourism trip'){
		echo "Tourism ticket not yet collected<br><br>";
		echo "<a href='../forms/settoreceived.php?id=".$row['id']."'><button>Set to received</button></a>";
		}else{echo "Seat reservation completed";}
		
		}elseif($row['status'] == 2){
		echo "<b>TICKET PURCHASE CONFIRMED</b><br><br>";
        echo "Tourism ticket collected. Seat reservation completed";
		}
		
		?>
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