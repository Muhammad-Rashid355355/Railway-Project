<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['fullname'], $_POST['username'], $_POST['email'], 
         $_POST['phone'], $_POST['gender'], $_POST['address'], $_POST['password'], $_POST['cpassword'] ) 
   &&!empty($_POST['fullname']) &&!empty($_POST['username']) &&!empty($_POST['email']) 
   &&!empty($_POST['phone']) &&!empty($_POST['gender']) &&!empty($_POST['address']) 
   &&!empty($_POST['password']) &&!empty($_POST['cpassword'])   
  ){
  
  $fullname			 			= trim($_POST['fullname']);
  $username 		 	     	= trim($_POST['username']);
  $email 		    			= trim($_POST['email']);
  $phone 		    			= trim($_POST['phone']);
  $gender 		    			= trim($_POST['gender']);
  $address 		    			= trim($_POST['address']);
  $password 		    		= trim($_POST['password']);
  $cpassword 		    		= trim($_POST['cpassword']);
  
  if(
     $fullname !== '' && $username !== '' && $email !== '' && $phone !== '' 
	 && $gender !== '' && $address !== '' && $password !== '' && $cpassword !== ''
	 ){
  
  if($password == $cpassword){
  $time = date('d-M-Y h:ia', time());
  
  $sql = mysqli_query($con, "SELECT `id` FROM `officers` WHERE `username`='".$username."'");
  if(mysqli_num_rows($sql) == 0){
  $sql2 = mysqli_query($con, "INSERT INTO `officers` 
							(`fullname`, `username`, `email`, `phone`, `gender`, `address`, `password`, `time`) 
							VALUES ('".$fullname."', '".$username."', '".$email."', '".$phone."', '".$gender."', '".$address."', '".$password."', '".$time."')
						");
  if($sql2){
   echo "<h1>Registration successful<br><br><a href='../officer/signin.php'>Login here</a></h1>"; 
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>Username already existed<br><br>Modify & retry</h1>";}
  }else{echo "<h1>Passwords do not match<br><br>Modify & retry</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
