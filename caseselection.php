<!DOCTYPE html>
<html>

<?php Session_start();


function printpost(){
	print "<pre>";
	print_r($_POST);
	print "<pre>";
}

function printsess(){
	print "<pre>";
	print_r($_SESSION);
	print "<pre>";

}

$turn = $_SESSION['turn'];

$case_conditon = (($turn == 0)||($turn > 0 && $turn < 5) || ($turn > 5 && $turn < 11) || ($turn > 11 && $turn < 17) || ($turn > 17 && $turn < 23) || ($turn > 23 && $turn < 26 ));
$post_banker_rounds = (($_SESSION['turn'] == 6) || ($_SESSION['turn'] == 12) || ($_SESSION['turn'] == 18) || ($_SESSION['turn'] == 24) || ($_SESSION['turn'] == 28));
$banker_rounds = (($_SESSION['turn'] == 5) || ($_SESSION['turn'] == 11) || ($_SESSION['turn'] == 17) || ($_SESSION['turn'] == 23) || ($_SESSION['turn'] == 26));

	if(	$turn == 0){
		
		$case_array = array(
			'1' => 0.01, 
			'2' => 5, 
			'3' => 10, 
			'4' =>25, 
			'5' =>50, 
			'6' =>100, 
			'7' =>500 , 
			'8' =>750, 
			'9' =>1000, 
			'10'=>2500, 
			'11'=>5000, 
			'12'=>7500, 
			'13'=>10000, 
			'14'=>15000, 
			'15'=>25000, 
			'16'=>50000,
			'17'=>75000,
			'18'=>100000,
			'19'=>200000,
			'20'=>200000,
			'21'=>400000,
			'22'=>500000,
			'23'=>750000,
			'24'=>1000000			
						);
		$_SESSION['case_array'] = $case_array;
}
//this function takes an associative array and randomizes the values but maintains the same keys
	function shuffle_cases(&$casearray){
	//saves array keys in array
		$keys = array_keys($casearray);
	//saves given array in a temp array
		$temp = $casearray;
	//empties given array
		$casearray = NULL;
	//shuffles the temp array will randomize key values pair indexes
		shuffle($temp);
	//iterate through the shuffled temp array and assign values to the now emptied given array using saved keys array for key assignment  
		foreach ($temp as $k => $values) {
			$casearray[$keys[$k]] = $values;
		}
	}


	//this function assigns the user their selected case into their seperate array and unsets the case value from the case array 
	function assign_usercase($usercasenum, &$case_array){	
	//remove selected case from casearray
		unset($case_array[$usercasenum]);
		
		
	}

	function eliminate_case(&$casearray){
		$elimination = $_POST['boxVal'];
		$case_array = $_SESSION['case_array'];
		if(($_SESSION['turn'] != 0) && ($_SESSION['turn'] != 6) && ($_SESSION['turn'] != 12) && ($_SESSION['turn'] != 18) && ($_SESSION['turn'] != 24) && ($_SESSION['turn'] != 27) && ($_SESSION['turn'] != 28 ))
		{
		$eliminationvalue = $case_array[$elimination];
		$_SESSION['eliminatevalue'] = $eliminationvalue;
		unset($case_array[$elimination]);
		$_SESSION['case_array'] = $case_array;
		}
	}


	function gen_cases(&$case_array) {
		print "<div id=\"button_box\">";
		print "<button type=\"submit\" form=\"box_selection_form\" value=\"submit\"> Submit</button>";
		print "</div>";

	print "<div class=\"glass\">";
	print	"<div id=\"boxContainer\">";
	print	 "<form id=\"box_selection_form\" action=\"\" method=\"POST\">";

		$_SESSION['turn'] = $_SESSION['turn'] + 1;

		for ($i=1; $i < 25; $i++) { 
		
		if(array_key_exists($i, $case_array)){
			print "<div class=\"box\">";
			print "<input type=\"radio\" name=\"boxVal\" value=\"$i\">";
			print "<span class=\"boxNr\">$i</span>";
			print "<span class=\"boxValue\"></span>";
			print "</div>";
		}
		else if ($_SESSION['usercasenum'] == $i) {
			$currentuser = $_SESSION['username'];
			print "<div class=\"box\">";
			print "<span class=\"boxNr\">$currentuser's Case</span>";
			print "<span class=\"boxValue\"></span>";
			print "</div>";
		}
		else{
			print "<div class=\"chosencase\">";
			print "<span class=\"boxNr\">nothing</span>";
			print "<span class=\"boxValue\"></span>";
			print "</div>";
		}
		
		}

	print	"</form>";
	print 	"</div>";
	print  "</div>";
	}

	function banker_offer_gen(&$casearray){
		$_SESSION['turn'] = $_SESSION['turn'] + 1;

		$offer=$_SESSION['usercaseval'];
			foreach($casearray as $key => $value){

				$offer = $offer + $value;
			}
		$_SESSION['bankeroffer'] = round($offer/(count($casearray) + 1));
		print "<div id=\"button_box\">";
		print "<a href=\"EndGameAcceptOffer.php\"><button> DEAL</button></a>";
		print "<a href=\"caseselection.php\"><button>NO DEAL</button></a>";
		print "</div>";

	print "<div class=\"glass\">";
	print	"<div id=\"boxContainer\">";
		print "<img id=\"banker_image\" src=\"banker_image.png\" alt=\"Banker Image\"><br/>";
		print "<p id=\"offer\">$ ".round($offer/(count($casearray) + 1))."</p>";

	print 	"</div>";
	print  "</div>";

	}

	function Keep_or_switch(){
		$case_array = $_SESSION['case_array'];
		print "<div id=\"button_box\">";
		print "<a href=\"EndGameKeepCase.php\"><button> Keep Case</button></a>";
		print "<a href=\"EndGameSwitchCase.php\"><button>Switch Case</button></a>";
		print "</div>";

	print "<div class=\"glass\">";
	print	"<div id=\"boxContainer\">";
	print	 "<form id=\"box_selection_form\" action=\"\" method=\"POST\">";

		for ($i=1; $i < 25; $i++) { 
		
		if(array_key_exists($i, $case_array)){
			print "<div class=\"box\">";
			print "<span class=\"boxNr\">$i</span>";
			print "<span class=\"boxValue\"></span>";
			print "</div>";
		}
		else if ($_SESSION['usercasenum'] == $i) {
			print "<div class=\"box\">";
			print "<span class=\"boxNr\">User Case</span>";
			print "<span class=\"boxValue\"></span>";
			print "</div>";
		}

		
		}

	print	"</form>";
	print 	"</div>";
	print  "</div>";
	}


?>

<head>
	<title>Deal or No Deal</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
	<div id="Phpblock">
		<?php
		if ($_SESSION['turn'] == 0) {
			shuffle_cases($_SESSION['case_array']);

			$usercase = $_POST['boxVal'];

			$_SESSION['usercasenum'] = $usercase;

			$_SESSION['usercaseval'] = $case_array[$usercase];

			assign_usercase($usercase, $_SESSION['case_array']);
		
		}

		?>
	</div>
	

	<div id="logo">
		<img class="logoImg" src="https://i.ibb.co/kKpRnSk/dealLogo.png">
	</div>

	<div id="Userprompt">
		<?php
		
			if($_SESSION['turn'] == 0){
			print "<p>Select a new case</p>";
			}else if($post_banker_rounds){
			$casearray = $_SESSION['case_array'];
			$casenum = $_SESSION['prev_case'];
			$caseval = $_SESSION['prev_case_val'];
			print "<p>Previous Case Selected: $casenum => $caseval</p>"	;
			print "<p>Select a New Case</p>";
			}elseif ($case_conditon) {
				$_SESSION['prev_case'] = $_POST['boxVal'];
			$casearray = $_SESSION['case_array'];
			$casenum = $_POST['boxVal'];
			$_SESSION['prev_case_val'] = $casearray[$casenum];
			print "<p>Previous Case Selected: $casenum => $casearray[$casenum]</p>"	;
			print "<p>Select a New Case</p>";
			}
			elseif($_SESSION['turn'] == 27){
			$casenum = $_SESSION['prev_case'];
			$caseval = $_SESSION['prev_case_val'];
			print "<p>Previous Case Selected: $casenum => $caseval</p>";
			print "<p> Choose to Keep or Switch Out Your Case </p>";

			}
			else if($banker_rounds){
			$_SESSION['prev_case'] = $_POST['boxVal'];
			$casearray = $_SESSION['case_array'];
			$casenum = $_POST['boxVal'];
			$_SESSION['prev_case_val'] = $casearray[$casenum];
			print "<p>Previous Case Selected: $casenum => $casearray[$casenum]</p>"	;
			print "<p>Deal Or No Deal</p>";


			}	
		?>
	</div>

				<?php
				$turn = $_SESSION['turn'];
				if($case_conditon){
					eliminate_case($_POST['boxVal']);
					gen_cases($_SESSION['case_array']);
				}elseif ($turn == 27) {
					
					Keep_or_switch();
				}
				else{
					eliminate_case($_POST['boxVal']);
					banker_offer_gen($_SESSION['case_array']);
				}
				?>

		
	</div>

</body>

</html>