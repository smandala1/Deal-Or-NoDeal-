
<!DOCTYPE html>
<html>
<?php Session_start();

$turn = 0;

$_SESSION['turn'] = $turn;
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
		<p>Choose a Case to Hold</p>
	</div>
	<div id="button_box">
		<button type="submit" form="box_selection_form" value="submit"> Submit</button>
	</div>
	<div class="glass">
		<div id="boxContainer">
			<form id="box_selection_form" action="caseselection.php" method="POST">

			<div class="box">
				<input type="radio" name="boxVal" value="1">
				<span class="boxNr">1</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="2">
				<span class="boxNr">2</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="3">
				<span class="boxNr">3</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="4">
				<span class="boxNr">4</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="5">
				<span class="boxNr">5</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="6">
				<span class="boxNr">6</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="7">
				<span class="boxNr">7</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="8">
				<span class="boxNr">8</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="9">
				<span class="boxNr">9</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="10">
				<span class="boxNr">10</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="11">
				<span class="boxNr">11</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="12">
				<span class="boxNr">12</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="13">
				<span class="boxNr">13</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="14">
				<span class="boxNr">14</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="15">
				<span class="boxNr">15</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="16">
				<span class="boxNr">16</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="17">
				<span class="boxNr">17</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="18">
				<span class="boxNr">18</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="19">
				<span class="boxNr">19</span
				><span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="20">
				<span class="boxNr">20</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="21">
				<span class="boxNr">21</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="22">
				<span class="boxNr">22</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="23">
				<span class="boxNr">23</span>
				<span class="boxValue"></span>
			</div>

			<div class="box">
				<input type="radio" name="boxVal" value="24">
				<span class="boxNr">24</span>
				<span class="boxValue"></span>
			</div>

		</form>
		</div>
	</div>

</body>

</html>