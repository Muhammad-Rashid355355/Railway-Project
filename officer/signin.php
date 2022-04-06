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
	<a href='../officer/index.php'>Officer</a>
	<a href='../passenger/signin.php'>Passenger</a>
	</div>
</div></div>

<div id='content' class='content' >
	<h1>Signin as Front desk Officer</h1>
	<div class='signin'>
		<div>
			<form method='post' action='../forms/officerregister.php'>
			<table class='form'>
			<tr>
				<td>Full name:</td>
				<td><input type='text' name='fullname' required></td>
			</tr>
            <tr>
				<td>Username:</td>
				<td><input type='text' name='username' required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type='email' name='email' required></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input type='number' name='phone' required></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<input type='radio' name='gender' value='Male' required> Male<br>
					<input type='radio' name='gender' value='Female' required> Female
				</td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><textarea name='address' required></textarea></td>
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
				<td colspan='2'><input type='submit' name='submit' value='Register as officer' ></td>
			</tr>
			</table>
			</form>
		</div>
			
		<div>
			<form method='post' action='../forms/officerlogin.php'>
			<table class='form'>
			<tr>
				<td>Username:</td>
				<td><input type='text' name='username' required></td>
			</tr>

			<tr>
				<td>Password:</td>
				<td><input type='password' name='password' required></td>
			</tr>
			<tr>
				<td colspan='2'><input type='submit' name='submit' value='Login as officer' ></td>
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
</body>
</html>