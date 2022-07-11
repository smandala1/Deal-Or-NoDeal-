<!DOCTYPE html>
<html>
<?php Session_start();

?>

<head>
	<title>Deal or No Deal</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<div id="logo">
		<img class="logoImg" src="https://i.ibb.co/kKpRnSk/dealLogo.png">
	</div>
	<div id="Userprompt">
		<p>Congratulations!!!</p>
	</div>

	<div class="glass">
		<div id="boxContainer">
			<?php 
			include("leaderboard.php");
			?>
			
			<h1 id="amountwon"> YOU WON <br/> <?php foreach ($_SESSION['case_array'] as $key => $value) {
				$winningval = $value;
				print $winningval;
			}?> </h1>
			<?php
			$currentuser =  $_SESSION['username'];
				generate_leaderboard($winningval , $currentuser);
			?>
		
		</div>
	</div>

</body>

</html>