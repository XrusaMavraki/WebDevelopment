<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 5/30/2016
 * Time: 12:13 PM
 */
require_once('../db_connection.php');
session_start();
if(!isset($_SESSION['userName'])){
    header("Location: /gemh/loginRegister/login.php");
}
$my_query="SELECT * FROM files WHERE File_Status='1' ";
$result = $dbc->query($my_query);
$className="btnDivNew"

?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>G.E.MI. form creator</title>
		<script type="text/javascript" src="filesPageJs.js"></script>
		<link  rel="stylesheet" type="text/css" href="style2.css">
	</head>
	
	<body>

		<div id="banner">
			<table>
				<td>
					<button id="New" type="submit"> Νέα αρχεία </button>
				</td>
				<td>
					<button id="Drafts" type="submit"> Πρόχειρα </button>
				</td>
				<td>
					<button id="Completed" type="submit"> Ολοκληρωμένα </button>
				</td>
				<td>
					<form action="../loginRegister/login.php" method="post">
						<label> Καλως όρισες <?=$_SESSION['userName']?> </label>
						<button id="Logout" name="Logout" type="submit"> Έξοδος </button>
					</form>
				</td>
			</table>
		</div>

		<div id="FilesDiv" class="innerList clearFix">
		
		</div>
		
	</body>
	
</html>
