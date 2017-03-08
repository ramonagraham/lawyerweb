<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

require 'dbconnect.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $errors = array();

        // check for username
        if (empty($_POST['username'])) {
            $errors[] = "Please enter your username.";
            echo '<p>' . mysqli_error($dbc);
        }
        else {


            $myusername = mysqli_real_escape_string($dbc, $_POST['username']);
            $mypassword = mysqli_real_escape_string($dbc, $_POST['password']);

            $sql = "SELECT user_id FROM users WHERE username = '$myusername' and passcode = '$mypassword'";
            $result = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $count = mysqli_num_rows($result);

            if ($count == 1) {

                header("location: /dms/filesearching.php");
            } else {
                $error = "Your Login Name or Password is invalid";
            }
        }

    }

