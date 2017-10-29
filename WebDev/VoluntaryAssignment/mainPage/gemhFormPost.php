<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/14/2016
 * Time: 10:31 PM
 */
require_once('../db_connection.php');
session_start();
if(!isset($_GET['submit'])){
   //header() n paei piso k n bgali ena error?
}
$post = file_get_contents('php://input');
$arr=json_decode($post);
$file_Id=$arr->fileID;

if($_GET['submit']==='submitBtn'){
    $status=3;
}
else{
    $status=2;
}

$name=$_SESSION['userName'];
$dbc->begin_transaction();

if($stmt= $dbc->prepare("INSERT INTO `filesform` (`File_id`, `formJsonData`,`UserName`) VALUES (?, ?,?) ON DUPLICATE KEY UPDATE `formJsonData`=? ")){
    $stmt->bind_param('isss', $file_Id,$post,$name,$post);
}
$stmt->execute();

if($stmt->error!== ""){
    $dbc->rollback();
    header("Location: gemh.php?filename=".$_GET['filename']."&fileID=".$file_Id."&error=SaveError");
}



if(isset($status)) {
    $my_query2 = "UPDATE `files` SET `File_Status` =$status WHERE `files`.`File_id` =$file_Id ";
    $dbc->query($my_query2);
    if ($dbc->error !== "") {
        $dbc->rollback();
        header("Location: gemh.php?filename=".$_GET['filename']."&fileID=".$file_Id."&error=SaveError");
    }
}
$dbc->commit();


header("Location: ?".$_GET['filename']."&fileID=".$file_Id."&fileStatus=".$status."&saveComplete=YES");
