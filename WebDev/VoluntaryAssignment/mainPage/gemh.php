<?php require_once('../db_connection.php');
session_start();
if(!isset($_SESSION['userName'])){
header("Location: /gemh/loginRegister/login.php");
}
if(!isset($_GET['filename'])&&!isset($_GET['fileID'])){
	header("Location: /gemh/filesPage/gemhList.php");
}
if($_GET['fileStatus']==='2'||$_GET['fileStatus']==='3'){
include('gemhFormLoad.php');
}
else{
	$_SESSION['originalPoster']="";
}
?>

<!DOCTYPE html>

<meta charset="utf-8" />
<html>

	<head>
		<meta charset="UTF-8">
		<title>G.E.MI. form creator</title>
		<link  rel="stylesheet" type="text/css" href="style.css">
        <script type="text/javascript" src="mainPageFormJs.js"></script>
		<script type="text/javascript">
			setJsonDataLoad('<?= $_SESSION['jsonDataLoad'] ?>');
		</script>
	</head>

	<body >

		<div id= "formAndBanner">
		
            <div id="banner">
				<table>
					<td>
						<button id="returnBtn" type="submit"> Επιστροφή στη λίστα μου </button>
					</td>
					<td>
						<button id="draftBtn" name="formAction" onclick="handleFormData();return false;" form="form" value="draftSubmit"> Αποθήκευση στα πρόχειρα </button>
					</td>
					<td>
						<form action="../loginRegister/login.php" method="post">
							<button id="Logout" name="Logout" type="submit"> Έξοδος</button>
						</form>
					</td>
				</table>
            </div>
		
		
			<form id="form">

				<fieldset>
					<legend> Σύσταση Ανώνυμης Εταιρίας </legend>
					<input class="in" id="formNumber" name="formNumber" type="text" min="0" placeholder="Αριθμός" >
					<input class="in" id="eponimia" name="eponimia" type="text" placeholder="Επωνυμία">
					<input class="in" id="title" name="title" type="text" min="0" placeholder="Διακριτικός τίτλος">
					<input class="in" id="notary" name="notary" type="text" placeholder=" Όνομα συμβολαιογράφου">
				</fieldset>
				<fieldset>
					<legend> Αριθμός ιδρυτών</legend>
					<input class="in" id="members" name="members" type="number" value="0" min="0">
					<a href="#" id="filldetails">Δημιουργία αντίστοιχων πεδίων</a>
				</fieldset>

				<div id="ownersTemplate">
				
				</div>
				<fieldset>
					<legend> Έδρα, διάρκεια, σκοπός </legend>
					<input class="in" id="edra" name="edra" type="text" placeholder="Έδρα εταιρίας">
					<input class="in" id="duration"  name="duration" type="text" min="0" placeholder="Διάρκεια (έτη)">
					<textarea class="in" id="purpose" name="purpose" rows="4" lines="3" placeholder="Σκοπός"></textarea>
				</fieldset>

				<fieldset>
					<legend> Μετοχές </legend>
					<input class="in" id="shares" name="shares" type="text" min="0" placeholder="Αριθμός μετοχών">
					<input class="in" id="sharePrice" name="sharePrice" type="text" min="0" placeholder="Αξία έκαστης">
					<input class="in" id="capital" name="capital" type="text"  placeholder="Μετοχικό κεφάλαιο">
					<select class="in" id="currency" name="currency">
						<option value="1" selected> Δρχ. </option>
						<option value="2"> € </option>
						<option value="3"> $ </option>
						<option value="4"> Άλλο </option>
					</select>
				</fieldset>

				<div align="center">
					<button  id="submitButton" name="formAction" class="btn" value="completeSubmit" onclick="handleFormData(this);return false;"> Υποβολή </button> <br/>
				</div>
				
				<input id="fileID" class="in" type="text" name="fileID" style="display:none" value="<?= $_GET['fileID']?>">
				<input id="filename" type="text" name="filename" style="display: none" value="<?= $_GET['filename']?>">
				<input id="userName" type="text" name="userName" style="display:none" value="<?=$_SESSION['userName']?>">
				<input id="originalPoster" type="text" name="originalPoster" style="display:none" value=" <?=$_SESSION['originalPoster'] ?>">
				<a href="../Files/<?= $_GET['filename']?>" target="_blank"> Μετάβαση στο αρχείο </a>
				
			</form>
			
		</div>
			
		<div id="viewer"> </div>
		
		<script src="PDFObject-master\pdfobject.js"> </script>
		<script> PDFObject.embed("../Files/<?= $_GET['filename']?>", "#viewer"); </script>

	</body>

</html>
