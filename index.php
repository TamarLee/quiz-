<?php
session_start();
include_once("quiz.php");

$answers = [];

if(empty($_POST)){
	$_SESSION["questionId"] = 0;
	$_SESSION["result"] = 0;
} else {
	$n = $_SESSION["questionId"];
	if($_POST["answer"] == $quiz["$n"]["correct option"]){
		$_SESSION["result"]++;
	}
	if ($_SESSION["questionId"] < sizeof($quiz)-1) {
		$_SESSION["questionId"]++;
	} else {
		echo "თქვენ დააგროვეთ ".$_SESSION["result"]." სწორი პასუხი";
		die();
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>quiz</title>
</head>
<body>

<form action="#" method="post">
		
	
		<br><p><?=$quiz[$_SESSION["questionId"]]["question"]?></p><br>

		<?php foreach ($quiz[$_SESSION["questionId"]]["options"] as $key => $option): ?>
			<label>
				<p><input 

					type="radio" 
					name="answer" 
					value='<?=$quiz[$_SESSION["questionId"]]["options"]["$key"]?>'>

					<?=$option?>
				</p>
			</label>
		<?php endforeach ?>
		<br><p><input type="submit" value="შემდეგი შეკითხვა"></p>
</form>


</body>
</html>