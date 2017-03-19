<?php
/**
 * Created by PhpStorm.
 * User: Hillary
 * Date: 3/15/2017
 * Time: 5:58 PM
 */

//destroy session when user logs out
    session_start();
    unset($_SESSION['login_user']);
    session_destroy();
?>