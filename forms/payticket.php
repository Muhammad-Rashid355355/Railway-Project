<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['trip'], $_POST['passenger'], $_POST['seat']) 
   &&!empty($_POST['trip']) &&!empty($_POST['passenger']) &&!empty($_POST['seat']) 

  ){
  
  $trip			 			    = trim($_POST['trip']);
  $passenger 		    	    = trim($_POST['passenger']);
  $seat 		    			= trim($_POST['seat']);
  
  if(
     $trip !== '' && $passenger !== '' && $seat !== ''
	 ){
$time = date('d-M-Y h:ia', time());  
  $sql = mysqli_query($con, "INSERT INTO `bookings` 
							(`trip`, `passenger`, `seat`, `time`) 
							VALUES (".$trip.", ".$passenger.", ".$seat.", '".$time."')
						");
  if($sql){
  header ("Location: ../passenger/orderhistory.php");
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
