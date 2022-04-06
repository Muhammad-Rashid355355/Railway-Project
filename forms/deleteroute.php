<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "DELETE FROM `routes` WHERE `id`=".$_GET['id']."");
$sql2 = mysqli_query($con, "DELETE FROM `trips` WHERE `route`=".$_GET['id']."");
header ("Location: ../admin/routes.php");
?>
