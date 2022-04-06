<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "DELETE FROM `trips` WHERE `id`=".$_GET['id']."");
$sql2 = mysqli_query($con, "DELETE FROM `bookings` WHERE `trip`=".$_GET['id']."");
header ("Location: ../admin/trips.php");
?>
