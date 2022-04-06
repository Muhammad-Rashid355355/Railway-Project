<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['ttype'], $_POST['train'], $_POST['route'], $_POST['date']) 
   &&!empty($_POST['ttype']) &&!empty($_POST['train']) &&!empty($_POST['route']) &&!empty($_POST['date']) 
  ){
  
  $ttype			 			= trim($_POST['ttype']);
  $train			 			= trim($_POST['train']);
  $route 		    	        = trim($_POST['route']);
  $date 		    			= trim($_POST['date']);
  
  if(
     $ttype !== '' && $train !== '' && $route !== '' && $date !== '' 
	 ){
$date2 = strtotime($date);  
  
  $sql = mysqli_query($con, "INSERT INTO `trips` 
							(`ttype`, `train`, `route`, `date`, `date2`) 
							VALUES ('".$ttype."', ".$train.", ".$route.", '".$date."', ".$date2.")
						");
  if($sql){
header ("Location: ../admin/trips.php");
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
