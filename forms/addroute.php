<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['arrival'], $_POST['departure'], $_POST['tfare'], 
         $_POST['tfrom'], $_POST['tto'] ) 
   &&!empty($_POST['arrival']) &&!empty($_POST['departure']) &&!empty($_POST['tfare']) 
   &&!empty($_POST['tfrom']) &&!empty($_POST['tto']) 
  ){
  
  $arrival			 			= trim($_POST['arrival']);
  $departure 		    	    = trim($_POST['departure']);
  $tfare 		    			= trim($_POST['tfare']);
  $tfrom 		    			= trim($_POST['tfrom']);
  $tto 		    	            = trim($_POST['tto']);
  
  if(
     $arrival !== '' && $departure !== '' && $tfare !== '' 
	 && $tfrom !== '' && $tto !== ''
	 ){
  
  
  $sql = mysqli_query($con, "INSERT INTO `routes` 
							(`arrival`, `departure`, `tfare`, `tfrom`, `tto`) 
							VALUES ('".$arrival."', '".$departure."', '".$tfare."', '".$tfrom."', '".$tto."')
						");
  if($sql){
header ("Location: ../admin/routes.php");
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
