<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/11/2016
 * Time: 12:04 PM
 */
require_once('db_connection.php');
session_start();
$json = file_get_contents('php://input');

if ($json !== "" &&isset($_SESSION['userName']))
{

    $jsonData = json_decode($json);
    $movieId = $jsonData->movieId;
    $rating=$jsonData->rating;
    if($rating<0 ||$rating>5)
    {
        $_SESSION['error']="rating_error_wrong_rating";
        //return? redirect? ti?
    }
    $stmt= $dbc->prepare("SELECT * FROM rating WHERE `user_id`=? AND `movie_id`=? ");
    $username=$_SESSION['userName'];

    $stmt->bind_param('si',$username,$movieId);
    $stmt->execute();
    $stmt->store_result();
    $stmt->fetch();
    $numRows = $stmt->num_rows;
    $stmt->close();
    if($numRows === 0)
    {
        $stmt = $dbc->prepare("INSERT INTO rating (`user_id`, `movie_id`,`movie_rating`) VALUES (?, ?,?)");
        $stmt->bind_param('sii', $_SESSION['userName'], $movieId, $rating);
    }
    else{
        $stmt=$dbc->prepare("UPDATE rating SET `movie_rating`=?  WHERE `user_id`=? AND `movie_id`=?");
        $stmt->bind_param('isi',$rating,$_SESSION['userName'],$movieId);
    }
    $stmt->execute();
    $stmt->store_result();
    $stmt->close();

}