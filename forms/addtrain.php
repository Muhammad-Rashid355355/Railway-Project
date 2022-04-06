<?php
ob_start();
session_start();
require_once '../connection.php'; 
?>
<style>
h1{text-align: center; margin: 100px 0px;  }
</style>
<?php

if(isset($_POST['tn'], $_POST['ts']) 
   &&!empty($_POST['tn']) &&!empty($_POST['ts'])   
  ){
  
  $tn			 			= trim($_POST['tn']);
  $ts 		 	     	    = trim($_POST['ts']);
  
  if($tn !== '' && $ts !== '' ){
  if($_FILES['tp']['tmp_name'][0] !== ''){

  
  
  
  $sql = mysqli_query($con, "SELECT `id` FROM `trains` WHERE `number`='".$tn."'");
  if(mysqli_num_rows($sql) == 0){
  $sql2 = mysqli_query($con, "INSERT INTO `trains` 
							(`number`, `seats`) 
							VALUES ('".$tn."', '".$ts."')
						");
  if($sql2){
  $id = mysqli_insert_id($con);
  
  $error = array();
  $success = array();
  $files = $_FILES['tp'];
  foreach($files['tmp_name'] as $pos=>$file_tmp){
  
      $file_name = $files['name'][$pos];
      $img_array = array('png', 'jpg', 'gif', 'jpeg');
	  $file_size = $files['size'][$pos];
	  $file_ext = explode('.', $file_name);
	  $file_ext = strtolower(end($file_ext));
	  if($file_size <= 4194304){
	  if(in_array($file_ext, $img_array)){
	  if(getimagesize($file_tmp) == true){
	  $rand = rand();
	  $uniqid = uniqid();
	  $file_enc = $rand.$uniqid.$file_name;
	  if(move_uploaded_file($file_tmp, '../uploads/'.$file_enc)){
	  

	  $sql3 = mysqli_query($con, "INSERT INTO `trainsphotos` (`train`, `photo`) 
	                             VALUES (".$id.", '".$file_enc."')");
	  if($sql3){
           $success[] = 1;	  
         }else{ 
	        if(file_exists("../uploads/".$file_enc."")){
			unlink("../uploads/".$file_enc."");
			}
			$error[] = $file_name. ' not added';
	       }
	  
	  }else{$error[] = $file_name.' not uploaded';}
	  }else{$error[] = $file_name.' fails photo genuine test';}
	  }else{$error[] = $file_name.' is not a photo';}
	  }else{$error[] = $file_name.' size is > 4mb. All images must be <= 4mb</h1>';}
	  }
	 
    if(!empty($success)){
	header ("Location: ../admin/trains.php");
	}else{
	       $impl = implode('<br><hr><br>', $error);
		   echo "<h1>".$impl."</h1>";
		   $sql4 = mysqli_query($con, "DELETE FROM `trains` WHERE `id`=".$id."");
	     }
  
  
  
  
  
  }else{echo "<h1>".mysqli_error($con)."<br>Unexpected error. Try again later</h1>";}
  }else{echo "<h1>Train number already existed<br><br>Modify & retry</h1>";}
  }else{echo "<h1>Photos upload field must not be empty</h1>";}
  }else{echo "<h1>All fields required</h1>";}
  }else{echo "<h1>All fields required</h1>";}
   


?>
