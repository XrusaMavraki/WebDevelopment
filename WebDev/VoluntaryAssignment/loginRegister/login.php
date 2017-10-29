<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 5/24/2016
 * Time: 2:22 PM
 */

require_once ('../db_connection.php');

//$cookieParams = session_get_cookie_params();
//session_set_cookie_params($cookieParams["lifetime"],
//    $cookieParams["path"],
//    $cookieParams["domain"],
//    true, true);
session_start();

//Store Session Data

if(isset($_POST['Logout'])){
    session_destroy();

}
if (isset($_SESSION['userName']))
{

    header("Location: /gemh/filesPage/gemhList.php");
}


if (isset($_POST['userName'])&&isset($_POST['passWord'])){
    if(isset($_SESSION['error']))
    {
        unset($_SESSION['error']);
    }
    login($_POST['userName'],$_POST['passWord'],$dbc);
}
else if (isset($_SESSION['userName'])&&isset($_SESSION['logOut']))
{
    session_destroy(); //tha to balo stin ali selida logika

}


function login($userName, $passWord,$mysqli)
{


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
                    header("Location: /gemh/filesPage/gemhList.php");
                }
                else{
                    $_SESSION['error']="login_error_1";

                }
            }
        }



}


?>




<!DOCTYPE html>

<meta charset="utf-8" />
<html>

<head>

    <title> G.E.MI. form creator </title>
    <link rel="stylesheet" type="text/css" href="loginStyle.css">

</head>

<body>

<div id="loginRegister">

    <form id="login_container" action ="login.php" method="post" >


            <label> Είστε νέος χρήστης; Πατείστε το πλήκτρο Εγγραφή</label>
            <div align="center">
            <button type="submit" name="register" id="register" onclick="window.location.href='register.php'"> Εγγραφή </button>
            </div>
        <?php
        if(isset($_SESSION['error'])) {
            switch ($_SESSION['error']) {
                case "login_error_1": {
                    ?>
                    <label>Λάθος κωδικός ή όνομα χρήστη</label>
                    <?php
                    unset($_SESSION['error']);
                    break;

                }
            }
        }
        ?>
        <fieldset>
            <legend> Στοιχεία χρήστη </legend>
            <input class="in" type="text" id="username" name="userName" required placeholder="Όνομα χρήστη">
            <div id="tooltip">
                <input class="in" type="password" id="password" name="passWord" pattern="(?=.*\d)(?=.*[0-9]).{5,}" required placeholder="Κωδικός " title="Ο κωδικός πρέπει να περιέχει τουλάχιστον 5 χαρακτήρες και να περιέχει τουλάχιστον ένα ψηφίο (0-9)">
            </div>

        </fieldset>

        <div align="center">
            <button type="submit" name="login" > Είσοδος </button>

        </div>

    </form>

</div>

</body>

</html>
