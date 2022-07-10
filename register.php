<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./style.css">
		<meta name="author" content="Ja'Kari (J.B) Bonardy">
		<title> Register Your Account </title>
	</head>
	<body>
		<h1>Please enter your login information to register.</h1>
		<?php
	
		echo "Username: <input type=\"text\" name=\user_val\"> <br>";
		echo "Password: <input type=\"text\" name=\pass_wrd\"> <br>";
		echo "Re-enter Password: <input type=\"text\" name=\pass_cfn\"> <br>";

		echo "<input type=\"submit\" value=\"Register\" name=\"login\">"
	
		$login = $_POST['user_val'];
		$pswrd = $_POST['pass_wrd'];
		$pwdcf = $_POST['pass_cfn'];
		$usrdb = fopen ("users.txt", "w") or die ("unable to open file!");
		$newuser = "";
		
	
		$passMatch = false;
			if ($pswrd == $pwdcf){
				$passMatch = true;
			}

		if ($passMatch){
			$newuser = "$login | $pswrd\n";
			fwrite($usrdb, $newuser);
			fclose($usrdb);
			echo "<br> Account Created. Welcome, $login </br>"
			
		}else{
			echo "<br> Passwords do not match. Please re-enter. <br>";
			}
		
		
		?>
		
		<form action="login.php" method="post">
		Username: <input type="text" name="user">
		<br>
		Password: <input type="password" name="pass">
		<br>
		Re-Enter Password: <input type="password" name="pscf">
		<br>
		<input type="submit" name="subBut" value="Login">
		</form>
		
		<a href= "./login.php"><input type="submit" name="yeAct" value="I have an account"></a>
	</body>
</html>