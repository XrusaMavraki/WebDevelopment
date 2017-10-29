<?php

session_start();
$endtime = microtime(true);
$time_needed= $endtime - $_SESSION["start_time"];
$correct_answer= $_SESSION["correct_answers"];
$num_of_correct=0;
for($i=0;$i<count($correct_answer);$i++){
    if(!isset($_POST[$i])) continue;
    if($_POST[$i]===$correct_answer[$i]){
        $num_of_correct++;
    }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quiz!</title>
		<link rel="stylesheet" href="submitStyle.css" type="text/css">
	</head>
	
	<body>
	
		<div align="center" id="container">
				
				<legend> <span class="small">THE</span>QUIZ </legend>
				
				<div align="center" id="inner">
					<p> You answered correctly to <?= $num_of_correct ?>/6 questions (<?= number_format((float)$time_needed, 2, '.', ''); ?> seconds) </p>
					<button type="submit" onclick="window.location='quiz.php'">Play again!</button>
				</div>
				
		</div>
		
	</body>
</html>