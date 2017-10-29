<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/10/2016
 * Time: 3:41 PM
 */
require_once('../db_connection.php');
session_start();
if(isset($_SESSION['error'])&& 0 === strpos($_SESSION['error'],'login'))
{
    unset($_SESSION['error']);
}
if (isset($_SESSION['userName']))
{
    header("Location: /gemh/filesPage/gemhList.php");
}
if (isset($_POST['passWord'])&&isset($_POST['passWord2'])){
    if ($_POST['passWord']!==$_POST['passWord2']){
        $_SESSION['error']="register_error_1";
    }

    else if (isset($_POST['userName'])){
        if(isset($_SESSION['error']))
        {
            unset($_SESSION['error']);

        }
        register($_POST['userName'],$_POST['passWord'],$_POST['email'],$dbc);
}
}
function register($userName,$passWord,$email,$mysqli){
    $passWord=password_hash($passWord, PASSWORD_DEFAULT);
    if ($stmt = $mysqli->prepare("INSERT INTO users (`UserName`, `PassWord`, `EmailAddress`) VALUES (?, ?,?)"))
    {

        $stmt->bind_param('sss', $userName,$passWord,$email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->fetch();
        if($stmt->affected_rows <= 0){
           $_SESSION['error']="register_error_2";
        }
        else{
            $_SESSION['userName']=$userName;
            header("Location: /gemh/filesPage/gemhList.php");
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

    <form id="login_container" method="post" >
        <?php
        if(isset($_SESSION['error'])){
            switch ($_SESSION['error']){
                case "register_error_1":
                {
                    ?>
                    <label>Λάθος κωδικός ή όνομα χρήστη</label>
                    <?php
                    break;
                }
                case "register_error_2":
                {
                    ?>
                    <label>Κάτι πήγε στραβά παρακαλώ ξαναπροσπαθείστε</label>
                    <?php
                    break;
                }
            }
            unset($_SESSION['error']);
        }
        ?>
        <fieldset>
            <legend> Στοιχεία χρήστη </legend>

        <input class="in" type="text" id="username" name="userName" required placeholder="Όνομα χρήστη">
        <div id="tooltip">
            <input class="in" type="password" id="password" name="passWord" pattern="(?=.*\d)(?=.*[0-9]).{5,}" required placeholder="Κωδικός " title="Ο κωδικός πρέπει να περιέχει τουλάχιστον 5 χαρακτήρες και να περιέχει τουλάχιστον ένα ψηφίο (0-9)">
            <input class="in" type="password" id="password2" name="passWord2" pattern="(?=.*\d)(?=.*[0-9]).{5,}" required placeholder="Επαναλάβετε τον κωδικό "
        </div>
          <input class="in" type="email" id="email" name="email" required placeholder="E-mail: (Example: someone@mail.com)">
</fieldset>

<div align="center">

    <button type="submit" name="register"formaction='register.php'> Εγγραφή </button>
</div>

</form>

</div>

</body>

</html>