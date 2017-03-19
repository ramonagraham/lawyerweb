<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';

//check if username and password are not empty and exist
if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $loginprocessing = new LoginProcessing();
        $result = $loginprocessing->checkUserExists($_POST['username'], $_POST['password']);
        echo $result;
    }
}

class LoginProcessing
{
    private $conn;

    //create new db connection
    function __construct()
    {
        $dbcon = new DbConn();
        $this->conn = $dbcon->getConnection();
    }

    //query database for user
    function checkUserExists($username, $password)
    {
        $sql = "SELECT user_id FROM users WHERE username = :username and passcode = :passcode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->bindValue(':passcode', $password, PDO::PARAM_STR);

        $stmt->execute();

        $count = $stmt->rowCount();

        //if block for only one user
        if ($count == 1) {
            $_SESSION['login_user'] = $username;
            $result = 'logged in';
        } else {
            $result = 'Your Login Name or Password is invalid';
        }
        $this->conn = null;
        return $result;
    }
}

?>