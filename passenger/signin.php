<html>
<head>
<link rel='stylesheet' href='../style.css'>
<title>Railway E-Ticket Reservation System</title>
</head>
<body>

<div id='header'><div id='wrap' class='wrap'>
	<div id='top'><a href='../index.php'>Railway E-Ticket Reservation System</a></div>
	<div id='bottom'>
	<a href='../admin/login.php'>Admin</a> 
	<a href='../officer/signin.php'>Officer</a>
	<a href='../passenger/signin.php'>Passenger</a>
	</div>
</div></div>

<div id='content' class='content' >
	<h1>Signin as passenger</h1>
	<div class='signin'>
		<div>
			<form method='post' name="form1" action='../forms/passengerregister.php'>
			<table class='form'>
			<tr>
				<td>Full name:</td>
				<td><input type='text' name='fullname' required></td>
			</tr>
			<tr>
				<td>Mobile No:</td>
				<td><input type='text' name='phone' id="phone" onchange="phonenumber(document.form1.phone)" ></td>
		
			</tr>
			<tr>
				<td>Email address:</td>
				<td><input type='email' name='email' onchange="ValidateEmail(document.form1.email)" required></td>
			</tr>
			<tr>
				<td>CNIC No:</td>
				<td><input type='text' name='cnic' onchange="Emailnumber(document.form1.cnic)" required></td>
			</tr>
			<tr>
				<td>Nearest station:</td>
				<td><input type='text' name='nearest_station' required></td>
			</tr>
            <tr>
				<td>Password:</td>
				<td><input type='password' name='password' required></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type='password' name='cpassword' required></td>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Register as passenger' ></td>
			</tr>
			</table>
			</form>
		</div>
			
		<div>
			<form method='post' action='../forms/passengerlogin.php'>
			<table class='form'>
			<tr>
				<td>Mobile No:</td>
				<td><input type='text' name='phone' onchange="phonenumber(document.form1.phone)" required></td>
			</tr>

			<tr>
				<td>Password:</td>
				<td><input type='password' name='password' required></td>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Login as passenger' ></td>
			</tr>
			</table>
			</form>
		</div>
	</div>

</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>

<script>

function phonenumber(f)
{
    f_val = f.value.replace(/D[^.]/g, "");
    f.value = f_val.slice(0,4)+"-"+f_val.slice(4,11);
	
	
}
function Emailnumber(G)
{
    f_val = G.value.replace(/D[^.]/g, "");
    G.value = f_val.slice(0,5)+"-"+f_val.slice(5,12)+"-"+f_val.slice(12,13);
}

function ValidateEmail(inputText)
{
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(inputText.value.match(mailformat))
{
alert("Valid email address!");
document.form1.username.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");
document.form1.text1.focus();
return false;
}
}

</script>
</body>
</html>