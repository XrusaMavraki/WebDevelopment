<!DOCTYPE html>
<html>

	<head>
		<title>Quiz started</title>
		<link rel="stylesheet" href="quizStyle.css" type="text/css">
	</head>
	
	
	
	<body>

		<?php
			session_start();
			$_SESSION['start_time']=microtime(true);
			$_SESSION["correct_answers"]=[];
			define('DB_USER', 'quiz_user');
			define('DB_PASSWORD', 'quiz');
			define('DB_HOST', 'localhost');
			define('DB_NAME', 'quiz');
			define('SELECT_RANDOM_6', 'select * from quiz_question order by rand() limit 6;');

			$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

			if ($dbc->connect_error)
			{
				die('Connect Error (' . $dbc->connect_errno . ') '
					. $dbc->connect_error);
			}

			$result = $dbc->query(SELECT_RANDOM_6);

		?>
		
		<div align="center">
		
			<form action="submit_quiz.php" method="post">
				
				<legend> <span class="small">THE</span>QUIZ </legend>
				
				<?php foreach($result as $i => $row): ?>
				<?php  array_push($_SESSION["correct_answers"], $row['correct']); ?>
				<div align="left">
					<table>
						<th> <?= $row['question'] ?> </th>
						<tr>
							<td><input type="radio" value="1" name="<?= $i ?>" /> <?= $row['ans1']?> </td>
							<td><input type="radio" value="2" name="<?= $i ?>" /> <?= $row['ans2']?> </td>
						</tr>
						<tr>
							<td><input type="radio" value="3" name="<?= $i ?>" /> <?= $row['ans3']?> </td>
							<td><input type="radio" value="4" name="<?= $i ?>" /> <?= $row['ans4']?> </td>
						</tr>
					</table>
				</div>
				<?php endforeach; ?>
				
				<div align="center">
					<button type="submit">Submit</button>
				</div>
				
			</form>
		</div>
		
	</body>
	
</html>
