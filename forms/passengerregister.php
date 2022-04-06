<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['fullname'], $_POST['phone'], $_POST['email'], 
         $_POST['cnic'], $_POST['nearest_station'], $_POST['password'], $_POST['cpassword'] ) 
   &&!empty($_POST['fullname']) &&!empty($_POST['phone']) &&!empty($_POST['email']) 
   &&!empty($_POST['cnic']) &&!empty($_POST['nearest_station']) 
   &&!empty($_POST['password']) &&!empty($_POST['cpassword'])   
  ){
  
  $fullname			 			= trim($_POST['fullname']);
  $email 		    			= trim($_POST['email']);
  $phone 		    			= trim($_POST['phone']);
  $cnic 		    			= trim($_POST['cnic']);
  $nearest_station 		    	= trim($_POST['nearest_station']);
  $password 		    		= trim($_POST['password']);
  $cpassword 		    		= trim($_POST['cpassword']);
  
  if(
     $fullname !== '' && $email !== '' && $phone !== '' 
	 && $cnic !== '' && $nearest_station !== '' && $password !== '' && $cpassword !== ''
	 ){
  
  if($password == $cpassword){
  $time = date('d-M-Y h:ia', time());
  
  $sql = mysqli_query($con, "SELECT `id` FROM `passengers` WHERE `phone`='".$phone."'");
  if(mysqli_num_rows($sql) == 0){
  $sql2 = mysqli_query($con, "INSERT INTO `passengers` 
							(`fullname`, `email`, `phone`, `cnic`, `nearest`, `password`, `time`) 
							VALUES ('".$fullname."', '".$email."', '".$phone."', '".$cnic."', '".$nearest_station."', '".$password."', '".$time."')
						");
  if($sql2){
   echo "<h1>Registration successful<br><br><a href='../passenger/signin.php'>Login here</a></h1>"; 
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>Mobile No already existed<br><br>Modify & retry</h1>";}
  }else{echo "<h1>Passwords do not match<br><br>Modify & retry</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
