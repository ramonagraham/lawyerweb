<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once 'dbconnect.php';
$loginmessage='';  //variable to handle error messages


if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {


        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];

        $stmt =  $pdo->prepare('SELECT user_id FROM users WHERE username = :username and passcode = :passcode');
        $stmt->execute(['username' => $myusername, 'passcode' => $mypassword]);


        $count = $stmt->rowCount();

        if ($count == 1) {
            $_SESSION['login_user'] = $myusername;
            $loginmessage = 'logged in';
        } else {
            $loginmessage = 'Your Login Name or Password is invalid';
        }
    }
}
echo $loginmessage;
?>