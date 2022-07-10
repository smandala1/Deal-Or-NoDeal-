<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./style.css">
		<meta name="author" content="Ja'Kari (J.B) Bonardy">
		<title> Login </title>
	</head>
	<body>
		<h1>Please enter your login information to continue.</h1>
		<?php
	
		echo "Username: <input type=\"text\" name=\user_val\"> <br>";
		echo "Password: <input type=\"text\" name=\pass_wrd\"> <br>";

		echo "<input type=\"submit\" value=\"Login\" name=\"login\">"
	
		$login = $_POST['user_val'];
		$pswrd = $_POST['pass_wrd'];
		$usrdb = file ('users.txt');
	
		$youOnTheList = false;
		foreach ($usrdb as $user){
			$userdet = explode( ' | ', $user);
			if ($userdet[0] == $login && $userdet[1] == $pswrd){
				$youOnTheList = true;
				break;
			}
		}

		if ($youOnTheList){
			echo "<br> Login Successful. Welcome back, $login </br>"
		}else{
			echo "<br> You have entered the wrong username/password. Please re-enter. <br>";
			}
		
		
		?>
		
		<form action="login.php" method="post">
		Username: <input type="text" name="user">
		<br>
		Password: <input type="password" name="pass">
		<br>
		<input type="submit" name="subBut" value="Login">
		</form>
		
		<a href= "./register.php"><input type="submit" name="noAct" value="I don't have an account"></a>
	</body>
</html>