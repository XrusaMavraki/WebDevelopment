<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/19/2016
 * Time: 12:51 PM
 */

//setcookie("jsonDataLoad"," ",time()-10);
unset($_SESSION['jsonDataLoad']);
require_once('../db_connection.php');
$_SESSION['originalPoster']="";
if($stmt= $dbc->prepare("SELECT formJsonData,UserName FROM files natural join  filesform  WHERE File_id= ?")){
    $stmt->bind_param('i', $_GET['fileID']);
}
$stmt->execute();
$result="";
$stmt->bind_result($json,$userName);
$stmt->fetch();
if(isset($json))
{
    //setrawcookie("jsonDataLoad",base64_encode($json));
    $_SESSION['jsonDataLoad'] = $json;
    if($userName!=="") {
        $_SESSION['originalPoster'] = $userName;
    }
}