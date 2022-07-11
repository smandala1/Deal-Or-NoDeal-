<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="./style.css">
		<title> Welcome </title>
	</head>
	<body>
		<div id="logo">
		<img class="logoImg" src="dealLogo.png">
		</div>
		<?php Session_start();

		if(isset($_POST['Register'])){
			$username = $_POST['user'];
			$password = $_POST['pass'];
			file_put_contents('users.txt', "\n$username,$password", FILE_APPEND);

		}

		$userfile = file("users.txt");

		$userfound = false;

		foreach ($userfile as $key => $value) {
			$line = explode(",", $userfile[$key]);
		 $saveduser = $line[0];
		 $savedpass = $line[1];
		 $currentuser = $_POST['user'];
		 $currentpassword = $_POST['pass'];
			if( (( trim($saveduser)  == $currentuser) && (trim($savedpass) == $currentpassword)))
			{
				$_SESSION['userid'] = $line[0];
				$userfound = true;
				break;
			}
		}

		if($userfound){
			$username = $_POST['user'];
			$_SESSION['username'] = $username;
			print "User Found";
			print "<div id=\"welmessagecon\">";
			print "<h1> Welcome, $username</h1>";
			print "</div><br/>";
			print "<div id=\"startgame\">";
			print "Click Below to Start Your Game<br>";
			print "</div>";
			print "<div id=\"button_box\">";
			print "<a href=\"holdcase.php\"><input id=\"button\"type=\"button\" value=\"Start Game\"></a>";
			print "</div>";
			

		}else{
			print "<div id=\"welmessagecon\">";
			print "Login Credentials Not Found Please Go Back and Try Again</br>Or Create A New Account";
			print "</div><br/>";
			print "<div id=\"button_box\">";
			print "<a href=\"index.php\"><input id=\"button\"type=\"button\" value=\"Login\"></a>";
			print "<a href=\"register.php\"><input id=\"button\"type=\"button\" value=\"Register\"></a>";
			print "</div>";

		}
		
		?>


	</body>
</html>