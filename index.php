<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./style.css">
		<title> Login </title>
	</head>
	<body>
		<div id="logo">
		<img class="logoImg" src="https://i.ibb.co/kKpRnSk/dealLogo.png">
		</div>

		<div id="form_container">
			<div id="form_box">
		<form action="welcome.php" method="POST">
		<strong>Username: </strong><input type="text" name="user">
		<br>
		<strong>Password: </strong> <input type="password" name="pass">
		<br>
		<input type="submit" name="subBut" value="Login">
		<a href="register.php"><input name="noAct" value="Register"></a>
		</form>
			</div>
		</div>
	</body>
</html>
