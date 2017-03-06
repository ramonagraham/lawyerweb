<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 3/5/2017
 * Time: 3:13 PM
 */

// Database access information, constant.
DEFINE('DB_USER','attorneyatlaw');
DEFINE('DB_PASSWORD', 'Password01');
DEFINE('DB_HOST','localhost');
DEFINE('DB_DATABASE','attorney_users');

$dbc=@mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE) OR die ('Could not connect to MySQL');
?>