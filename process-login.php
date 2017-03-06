<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

    include ("dbconnect.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
        $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);

        $sql = "SELECT user_id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count == 1) {
            session_register("myusername");
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }

