<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

session_start();
require_once '/home/attorneyatlaw/dbcon.php';

//set result to false unless image has been uploaded
$result = false;


//check blog post inputs and send to post blog function
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        $blogprocessing = new BlogProcessing();
        if (!empty($_FILES['uploadImage'])) {
            //$result = $blogprocessing->uploadImgtoServer($_FILES['uploadImage']);
            $target_dir = "assets/uploads/";
            $target_file = $target_dir . basename($_FILES['uploadImage']["name"]);
        }
        /*if ($result) {

        } else {
            $postBlog = $blogprocessing->postBlogEntry($_POST['title'], $_POST['content']);
        }*/

        //echo $postBlog;
        echo $target_dir;
    } else {
        echo "Please title and content in both fields";
    }
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
    function postBlogEntry($title, $content)
    {

        $sql = "INSERT INTO posts(title, content) VALUES (:title, :content)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);

        //if block for insert success or failed
        if ($stmt->execute()) {
            $result = "New record created successfully";
        } else {
            $result = "Please try your submission again";
        }
        echo $result;
    }

    function uploadImgtoServer($image)
    {
        $target_dir = "assets/uploads/";
        $target_file = $target_dir . basename($_FILES['uploadImage']["name"]);
        $uploadOk = 1;

        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        $check = getimagesize($image . ["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $result = "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($image . ["size"] > 500000) {
            $result = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 1) {
            if (move_uploaded_file($image . ["tmp_name"], $target_file)) {
                $result = true;
            } else {
                $result = false;
            }
        }
        return $target_file;
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
}


