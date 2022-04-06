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
<?php 
$sql = mysqli_query($con, "SELECT * FROM `trips` WHERE `id`=".$_GET['id']."");
$row = mysqli_fetch_assoc($sql);
$sql2 = mysqli_query($con, "SELECT * FROM `bookings` WHERE `trip`=".$row['id']." AND `passenger`=".$passenger['id']."");
if(mysqli_num_rows($sql2) == 0){

	$sql3 = mysqli_query($con, "SELECT * FROM `trains` WHERE id=".$row['train']."");
	$row3 = mysqli_fetch_assoc($sql3);
	$sql4 = mysqli_query($con, "SELECT * FROM `routes` WHERE id=".$row['route']."");
	$row4 = mysqli_fetch_assoc($sql4);

?>

			<form method='post' action='../forms/payticket.php'>
			<input type='hidden' name='trip' value="<?=$row['id']?>">
			<input type='hidden' name='passenger' value="<?=$passenger['id']?>">
			<table class='form'>
			<tr>
				<td>Trip:</td>
				<td>
					<b>Trip type:</b> <?=$row['ttype']?><br>
					<b>Arrival:</b> <?=$row4['arrival']?><br>
					<b>Departure:</b> <?=$row4['departure']?><br>
					<b>Date:</b> <?=$row['date']?><br>
					<b>Time:</b> <?=$row4['tfrom']?> - <?=$row4['tto']?><br>
				</td>
			</tr>

			<tr>
				<td>Train:</td>
				<td>
					<b>Train number:</b> <?=$row3['number']?><br>
			        <b>Total seats:</b> <?=$row3['seats']?>
				</td>
			</tr>
			
			
			<tr>
				<td>Ticket fare:</td>
				<td><?=number_format($row4['tfare'])?></td>
			</tr>

			
			<tr>
				<td>Seat No:</td>
				<td>
				   <select name='seat' required>
					<option value=''>--select--</option>
					<?php 
					for($i=1; $i<=$row3['seats']; $i++){
					$sql5 = mysqli_query($con, "SELECT * FROM `bookings` WHERE `trip`=".$row['id']." AND `seat`=".$i." AND `passenger`=".$passenger['id']."");
					if(mysqli_num_rows($sql5) == 0){
					echo "<option value=".$i.">seat ".$i."</option>";
					}}
					?>
					
				   </select>
				   <?php 
				   ?>

				</td>
			</tr>
			
			<tr>
				<td>Name on credit card:</td>
				<td><input type='text' name='' required></td>
			</tr>
			<tr>
				<td>Number on credit card:</td>
				<td><input type='number' name='' required></td>
			</tr>
			<tr>
				<td>Card CVV number (3 numbers):</td>
				<td><input type='number' name='' required></td>
			</tr>
			<tr>
				<td>Card expiration date:</td>
				<td><input type='date' name='' required></td>
			</tr>




			
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Book ticket' ></td>
			</tr>
			</table>
			</form>
<?php 
}else{ 
echo "<div id='links'>";
echo "<h3>You already booked for this trip.</h3>";
echo  "<a href='bookticket.php'>Return to previous page</a>";
echo "</div>";
}
?>



</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>