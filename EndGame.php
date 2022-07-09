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
			
			<h1 id="amountwon"> YOU WON <br/> <?php print $_SESSION['bankeroffer']; ?> </h1>
		
		</div>
	</div>

</body>

</html>