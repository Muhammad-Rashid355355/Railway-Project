<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;}
</style>
<?php

if(isset($_POST['username'], $_POST['password']) 
   &&!empty($_POST['username']) &&!empty($_POST['password'])
  ){
  
  $username			 	= trim($_POST['username']);
  $password 		    = trim($_POST['password']);
  
  if($username !== '' && $password !== '' 
	 ){
  
  $sql = mysqli_query($con, "SELECT * FROM `officers` WHERE `username`='".$username."' AND `password`='".$password."'");
  if(mysqli_num_rows($sql) == 1){
  $row = mysqli_fetch_assoc($sql);
  $_SESSION['officer'] = $row;
  header("Location: ../officer/index.php");
  
  }else{echo "<h1>Submitted username  & password not recognized. Modify and retry</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
