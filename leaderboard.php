<!DOCTYPE html>
<html>
	<head>
		
		<title> leaderboard </title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
		function generate_leaderboard($winningvalue , $currentuser){
		$leaderboard = file('leaderboard.txt');

		$index = 0;

		foreach ($leaderboard as $key => $value) {
			$line = explode(",", $value);
			$value = $line[0];
			$user = $line[1];
			$leaderboardarray[$index]['value'] = $value;
			$leaderboardarray[$index]['user'] = $user;
			$index=$index+1;

		}

		$nameA = array();

		foreach ($leaderboardarray as $key => $row)
		{
		    $nameA[$key] = $row['value'];
		}
		array_multisort($nameA, SORT_DESC, $leaderboardarray);


		print "<table id=\"leaderboard\">";
		print "<caption>Leader Board</caption>";
		for($i = 0 ; $i< 11; $i++){
			if(isset($leaderboardarray[$i]['value'])){
			$value = $leaderboardarray[$i]['value'];
			$user = $leaderboardarray[$i]['user'];
			if($value > $winningvalue){
			print "<tr>";
			print "<td> $value </td>";
			print "<td> $user </td>";
			print "</tr>";
			}else{
			print "<tr>";
			print "<td> $winningvalue </td>";
			print "<td> $currentuser </td>";
			print "</tr>";
			file_put_contents('leaderboard.txt', "\n$winningvalue,$currentuser", FILE_APPEND);
			$winningvalue = 0;
			$currentuser = "empty";
		}
		}
		}	
		print "</table>";
		}

		?>

	</body>
</html>