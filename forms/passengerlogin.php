<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;}
</style>
<?php

if(isset($_POST['phone'], $_POST['password']) 
   &&!empty($_POST['phone']) &&!empty($_POST['password'])
  ){
  
  $phone			 	= trim($_POST['phone']);
  $password 		    = trim($_POST['password']);
  
  if($phone !== '' && $password !== '' 
	 ){
  
  $sql = mysqli_query($con, "SELECT * FROM `passengers` WHERE `phone`='".$phone."' AND `password`='".$password."'");
  if(mysqli_num_rows($sql) == 1){
  $row = mysqli_fetch_assoc($sql);
  $_SESSION['passenger'] = $row;
  header("Location: ../passenger/index.php");
  
  }else  {echo $alert = '<script>alert("Submitted Mobile No  & password not recognized. Modify and retry")</script>';}  
  //echo 'alert("Submitted Mobile No  & password not recognized. Modify and retry")';  
  //echo '</script>'; }
  //{echo "<h1>Submitted Mobile No  & password not recognized. Modify and retry</h1>";}
  }else  {echo '<script type ="text/JavaScript">';  
    echo 'alert("All fields required")';  
    echo '</script>'; }//else{echo "<h1>All fields required</h1>";}
  }
  else  {echo '<script type ="text/JavaScript">';  
    echo 'alert("All fields required</h1>")';  
    echo '</script>'; }//else{echo "<h1>All fields required</h1>";}
   





 
?>
