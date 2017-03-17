<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $blogprocessing = new BlogProcessing();
        $result = $blogprocessing->postBlogEntry($_POST['title'], $_POST['content']);
        //$result = json_encode($result);
        echo $result;
    }
}

class BlogProcessing
{

    private $conn;

    function __construct()
    {
        $dbcon = new DbConn();
        $this->conn = $dbcon->getConnection();

    }

    function postBlogEntry ($title, $content) {

        $sql = "INSERT INTO posts(title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title',$title, PDO::PARAM_STR);
        $stmt->bindValue(':content',$content, PDO::PARAM_STR);


        if ($stmt->execute()) {
            $result = "New record created successfully";
        } else {
            $result = "Please try your submission again";
        }
        return $result;
    }

    function getBlogs() {

        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r: $results;
        $this->conn = null;
        return $results;

    }
}


