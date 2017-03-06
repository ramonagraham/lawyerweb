<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */


    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $errors = array();

        // checking for first name
        if(empty($_POST['firstname']))
        {
            $errors[] = 'You forgot to enter your first name.';
        }
        else
        {
            $fname = trim($_POST['firstname']);
        }

        $myusername = mysqli_real_escape_string($dbc,$_POST['username']);
        $mypassword = mysqli_real_escape_string($dbc,$_POST['password']);

        $sql = "SELECT user_id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
        $result = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

        $count = mysqli_num_rows($result);

        if($count == 1) {

            header("location: welcome.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    }

