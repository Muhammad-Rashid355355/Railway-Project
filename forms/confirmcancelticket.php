<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "SELECT * FROM `bookings` WHERE `id`=".$_GET['id']." AND `status`=3");
if(mysqli_num_rows($sql) == 1){
$sql2 = mysqli_query($con, "UPDATE `bookings` SET `status`=4 WHERE `id`=".$_GET['id']."");
}
header ("Location: ../officer/cancellations.php");
?>
