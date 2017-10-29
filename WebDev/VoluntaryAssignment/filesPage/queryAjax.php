<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/4/2016
 * Time: 9:19 PM
 */
require_once('../db_connection.php');
session_start();

if(isset($_GET['show'])) {
    if ($_GET['show'] !== '1' && $_GET['show'] !== '2' && $_GET['show'] !== '3') {
        header("Location: /gemh/filesPage/gemhList.php");
    }

}
$val=$_GET['show'];
if($val==='3'){
    $my_query="SELECT File_Name, File_Status, File_id, UserName FROM files NATURAL JOIN filesform WHERE File_Status=$val";
    $result=$dbc->query($my_query);
    $rows=array();
    while($r = mysqli_fetch_array($result,MYSQLI_NUM)) {
        array_push($rows,$r);
    }

}
else {
    $my_query = "SELECT * FROM files WHERE File_Status=$val";
    $result = $dbc->query($my_query);
    $rows = array();
    while ($r = mysqli_fetch_array($result, MYSQLI_NUM)) {
        array_push($rows, $r);
    }
}
echo json_encode($rows);