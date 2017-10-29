<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/24/2016
 * Time: 8:36 AM
 */
if(isset($_SESSION['userName'])){
    header("Location: /gemh/filesPage/gemhList.php");
}
header("Location: /gemh/loginRegister/login.php");