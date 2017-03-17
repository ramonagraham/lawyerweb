<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';


$dbcon = new DbConn();
$conn = $dbcon->getConnection();

if (isset($_POST['submit'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $loginprocessing = new LoginProcessing($conn);
        $result = $loginprocessing->checkUserExists($_POST['username'], $_POST['password']);
        //$result = json_encode($result);
        echo $result;
    }
}

class LoginProcessing
{
    private $conn;

    function __construct($conn)
    {
        $this->conn = $conn;
    }

    function checkUserExists($username, $password)
    {
        $sql = "SELECT user_id FROM users WHERE username = :username and passcode = :passcode";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':username',$username, PDO::PARAM_STR);
        $stmt->bindValue(':passcode',$password, PDO::PARAM_STR);

        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count == 1) {
            $_SESSION['login_user'] = $username;
            $result = 'logged in';
        } else {
            $result = 'Your Login Name or Password is invalid';
        }
        return $result;
    }
}
?>