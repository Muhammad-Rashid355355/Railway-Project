<?php 
ob_start();
session_start();
if(isset($_SESSION['admin'])){header("Location: admin/index.php"); die();}
if(isset($_SESSION['officer'])){header("Location: officer/index.php"); die();}
if(isset($_SESSION['passenger'])){header("Location: passenger/index.php"); die();}
?>
<html>
<head>
<link rel='stylesheet' href='style.css'>
<title>Railway E-Ticket Reservation System</title>
<style>
#bckimg{
	width: 100%;
height: 91.8vh;
	position: absolute;
}


</style>
</head>
<body>

<div id='header' style="background-color:#34495E;height:8vh"><div id='wrap'>
	<div id='top'><a href='index.php'>Railway E-Ticket Reservation System</a></div>
	<div id='bottom'>
	<a href='admin/Regestriations.php'  style="width:3vw;border-radius:5px; text-align: center;">Admin</a> 
	<a href='officer/Regestriations.php' style="width:2.5vw;border-radius:5px; text-align: center;">Officer</a>
	<a href='passenger/Passengerlogin.php' style="width:3vw;border-radius:5px; text-align: center;">Passenger</a>
	</div>
</div></div>

<div id='background'>
	<div id='info'>
		<div id='trips'>Single/round trips | Tourism trips | Long trips</div>
		<p>Railway E-Ticket Reservation System</p>
		
		<h4>Schedule a trip from the comfort of your home. 
		<br>Different routes, stations, departure times, fare choices. 
		<br>Best way to comfortably reach your destination.
		</h4>
		<a href='passenger\Passengerlogin.php' style="width:25vw;border-radius:5px; text-align: center;">START HERE</a>

	</div>
<img src='background.jpg' id="bckimg">
<marquee width="100%" direction="left" height="100px">
Baddar: Train is on the way. depature time is 9:30 AM
</marquee>



</div>


</body>
</html>