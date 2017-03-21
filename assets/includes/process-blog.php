<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';

//check blog post inputs and send to post blog function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $blogprocessing = new BlogProcessing();
        $result = $blogprocessing->postBlogEntry($_POST['title'], $_POST['content']);
        echo $result;
    }
    else {
        echo "Please fill in both fields";
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

    //insert blog entry to database
    function postBlogEntry ($title, $content) {

        $sql = "INSERT INTO posts(title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title',$title, PDO::PARAM_STR);
        $stmt->bindValue(':content',$content, PDO::PARAM_STR);

        //if block for insert success or failed
        if ($stmt->execute()) {
            $result = "New record created successfully";
        } else {
            $result = "Please try your submission again";
        }
        return $result;
    }

    //function to retrieve blogs
    function getBlogs() {

        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r: $results;
        $this->conn = null;
        return $results;
    }

    //function to retrieve a single blog
    function getBlogID($id) {
        $sql = "SELECT * FROM posts WHERE blog_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r: $results;
        $this->conn = null;
        return $results;
    }

    //function to delete a single blog
    function deleteBlog($id) {
        $sql = "DELETE FROM posts WHERE blog_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->conn = null;
    }
}
?>



