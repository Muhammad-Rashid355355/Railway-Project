<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Page with Background Image Example</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div id="bg"></div>

<form method='post' name="form1" action='../forms/passengerlogin.php'>
  <div class="form-field">
    <input type='text' name='phone' placeholder="Phone/Mobail NO" onchange="phonenumber(document.form1.phone)" required/>
  </div>
  
  <div class="form-field">
    <input type='password' name='password' placeholder="Password" required/>                         </div>
  
  <div class="form-field">
    <button class="btn"  type='submit' name='submit'  value='Login as passenger'>Log in</button>
    <a href="signin.php">Create Your Accounts</a>
    
  </div>
</form>
<!-- partial -->
<script>

function phonenumber(f)
{
    f_val = f.value.replace(/D[^.]/g, "");
    f.value = f_val.slice(0,4)+"-"+f_val.slice(4,11);
}

</script>  

</body>
</html>
