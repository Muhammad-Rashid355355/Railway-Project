<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "SELECT * FROM `passengers` WHERE `id`=".$_GET['id']." AND `status`=0");
if(mysqli_num_rows($sql) == 1){
$sql2 = mysqli_query($con, "UPDATE `passengers` SET `status`=1 WHERE `id`=".$_GET['id']."");
}
header ("Location: ../passenger/verification.php");
?>
