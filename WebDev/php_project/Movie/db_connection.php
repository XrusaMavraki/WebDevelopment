<?php
/**
 * Created by PhpStorm.
 * User: xrusa
 * Date: 6/7/2016
 * Time: 8:58 PM
 */
define('DB_USER', 'movies_user');
define('DB_PASSWORD', 'movies');
define('DB_HOST', 'localhost');
define('DB_NAME','movies');
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($dbc->connect_error)
{
    die('Connect Error (' . $dbc->connect_errno . ') '
        . $dbc->connect_error);
}