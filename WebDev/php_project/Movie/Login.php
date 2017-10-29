<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/7/2016
 * Time: 6:53 PM
 */
require_once ('db_connection.php');

session_start();

if (isset($_POST['userName'])&&isset($_POST['passWord'])){

    if(isset($_SESSION['error']))
    {
        unset($_SESSION['error']);
    }
    login($_POST['userName'],$_POST['passWord'],$dbc);
}
else if (isset($_SESSION['userName']))
{
    session_destroy();
}
header("Location: index.php");

function login($userName, $passWord,$mysqli)
{

    if(isset($_POST['login'])){
        if ($stmt = $mysqli->prepare("SELECT  PassWord
            FROM users
           WHERE UserName = ? 
            LIMIT 1"))
        {


            $stmt->bind_param('s', $userName);
            $stmt->execute();
            $stmt->store_result();
            $pass="";
            $stmt->bind_result($pass);
            $stmt->fetch();

            if ($pass!==""){
                if(password_verify($passWord, $pass )) {
                    $_SESSION['userName'] = $userName;
                }
                else{
                    $_SESSION['error']="login_error_1";
                   
                }
            }
        }
    }
    if(isset($_POST['register'])){
        $passWord=password_hash($passWord, PASSWORD_DEFAULT);
        if ($stmt = $mysqli->prepare("INSERT INTO users (`UserName`, `PassWord`) VALUES (?, ?)"))
        {

            $stmt->bind_param('ss', $userName,$passWord);
            $stmt->execute();
            $stmt->store_result();
            $stmt->fetch();
            if($stmt->affected_rows <= 0){
                $_SESSION['error']="login_error_2";
               
            }
            else{
                $_SESSION['userName']=$userName;

            }
        }
    }

}


?>

