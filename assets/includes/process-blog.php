<?php
/*
 *  Team Red Hot Chili Jellos
 *  Chris Barbour, Ramona Graham, Josh Lyon, Hillary Wagoner
 *  File: process-blog.php
 *  Purpose: This file contains the BlogProcessing class which has functions
 *  to insert a blog into the database (attorney_db database and blog table),
 *  upload image, retrieve the blogs, retrieve a single blog, and delete a blog.
 *
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';
$_SESSION['file'];
ob_start();

//check blog post inputs and send to post blog function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $blogprocessing = new BlogProcessing();
        if ($_FILES['uploadImage']['size'] > 0 && $_FILES['uploadImage']['error'] == 0) {
            $result = $blogprocessing->uploadImgtoServer($_FILES['uploadImage'], $_POST['title'], $_POST['content']);
        } else {
            $result = $blogprocessing->postBlogEntry($_POST['title'], $_POST['content'], null);
        }
    } else {
        $result = "Please fill out title and content";
    }
    $_SESSION['file'] = $result;
    ob_end_clean();
    header('Location: ../../post.php');
}

class BlogProcessing
{

    private $conn;
    public $uploadOk;

    function __construct()
    {
        $dbcon = new DbConn();
        $this->conn = $dbcon->getConnection();

    }

    //insert blog entry to database
    function postBlogEntry($title, $content, $image)
    {
        if ($image == null) {
            $sql = "INSERT INTO posts(title, content) VALUES (:title, :content)";
        } else {
            $sql = "INSERT INTO posts(title, content, image) VALUES (:title, :content, :image)";
        }
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        if ($image != null) {
            $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        }

        //if block for insert success or failed
        if ($stmt->execute()) {
            $result = "New record created successfully";
        } else {
            $result = "Please try your submission again";
        }
        return $result;
    }

    function uploadImgtoServer($image, $title, $content)
    {

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($image["name"]);
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $result = "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $result = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        //get file type
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        // Check file size
        if ($image["size"] > 500000) {
            $result = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $result = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            if (move_uploaded_file($image["tmp_name"], $target_file)) {
                $result = $this->postBlogEntry($title, $content, $target_file);
            } else {
                $result = "Image upload failed";

            }
        }
        return $result;
    }


    //function to retrieve blogs
    function getBlogs()
    {

        $sql = "SELECT * FROM posts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r:
        $results;
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



