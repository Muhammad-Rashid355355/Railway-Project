<html>
<head>
<link rel='stylesheet' href='../style.css'>
<title>Railway E-Ticket Reservation System</title>
</head>
<body>

<div id='header'><div id='wrap'>
	<div id='top'><a href='../index.php'>Railway E-Ticket Reservation System</a></div>
	<div id='bottom'>
	<a href='../admin/login.php'>Admin</a> 
	<a href='../officer/signin.php'>Officer</a>
	<a href='../passenger/signin.php'>Passenger</a>
	</div>
</div></div>

<div id='content'>
<h1>Login as Admininstrator</h1>

			<form method='post' action='../forms/adminlogin.php'>
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
				<td colspan='2'><input type='submit' name='submit' value='Login as admin' ></td>
			</tr>
			</table>
			</form>



</div>
</div>

<div id='footer'>
	© 2021 Railway E-Ticket Reservation System <br>
	Privacy Policy | All terms reserved
</div>
</body>
</html>