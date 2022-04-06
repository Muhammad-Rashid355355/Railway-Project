<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "DELETE FROM `passengers` WHERE `id`=".$_GET['id']."");
$sql2 = mysqli_query($con, "DELETE FROM `bookings` WHERE `passenger`=".$_GET['id']."");
header ("Location: ../admin/passengers.php");
?>
