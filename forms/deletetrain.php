<?php
ob_start();
session_start();
require_once '../connection.php'; 
$sql = mysqli_query($con, "DELETE FROM `trains` WHERE `id`=".$_GET['id']."");
$sql2 = mysqli_query($con, "SELECT * FROM `trainsphotos` WHERE `train`=".$_GET['id']."");
while($row2 = mysqli_fetch_assoc($sql2)){
	        if(file_exists("../uploads/".$row2['photo']."")){
			unlink("../uploads/".$row2['photo']."");
			}

}
$sql3 = mysqli_query($con, "DELETE FROM `trips` WHERE `train`=".$_GET['id']."");
header ("Location: ../admin/trains.php");
?>
