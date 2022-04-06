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
	<th class='center' colspan='3'>Passenger verifications</th>
</tr>
<tr>
	<th>Passenger</th>
	<th>Signup</th>
	<th>Verification<br>status</th>
</tr>

<?php 
$sql = mysqli_query($con, "SELECT * FROM `passengers` WHERE `status`<>0 ORDER BY `id` DESC");
if(mysqli_num_rows($sql) > 0){
while($row = mysqli_fetch_assoc($sql)){
?>
<tr>
	<td>
		<b>Name:</b> <?=$row['fullname']?><br><br>
		<b>Email:</b> <?=$row['email']?><br><br>
		<b>Mobile No:</b> <?=$row['phone']?><br><br>
		<b>CNIC:</b> <?=$row['cnic']?><br><br>
		<b>Nearest station:</b> <?=$row['nearest']?>
	</td>
	<td>
		<?=$row['time']?>
	</td>
	<td>
		<?php 
		
		if($row['status'] == 1){
		echo "<b><i>Not verified</i></b><br><br>";
		echo "<a href='../forms/acceptaccount.php?id=".$row['id']."'><button>accept account</button></a><br><br>";
		echo "<a href='../forms/rejectaccount.php?id=".$row['id']."'><button>reject account</button></a>";
		
		}elseif($row['status'] == 2){
		echo "<b>ACCOUNT ACCEPTED</b>";
		
		}elseif($row['status'] == 3){
		echo "<b><i>ACCOUNT REJECTE</i></b>";
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