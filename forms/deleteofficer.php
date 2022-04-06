<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "DELETE FROM `officers` WHERE `id`=".$_GET['id']."");
header ("Location: ../admin/officers.php");
?>
