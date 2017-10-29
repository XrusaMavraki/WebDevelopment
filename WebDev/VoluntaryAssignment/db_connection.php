<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/10/2016
 * Time: 3:17 PM
 */
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
define('DB_NAME', 'gemh');
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$dbc->set_charset("utf8");

if ($dbc->connect_error)
{
    die('Connect Error (' . $dbc->connect_errno . ') '
        . $dbc->connect_error);
}
