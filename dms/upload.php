<?php
session_start();
$_SESSION['uploaded'];
ob_start( );
require '/home/attorneyatlaw/dbcon.php';
require 'fileprocessing.php';


$dbcon = new DbConn();
$conn = $dbcon->getConnection();
$fileName = basename($_FILES["fileToUpload"]["name"]);
$fileProcessor = new FileProcessing($conn, $fileName);
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$uploadFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $_SESSION['uploaded'] = "File is not a valid file.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['uploaded'] = "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000000000) {
    $_SESSION['uploaded'] = "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if(($uploadFileType != "txt")) {
        $_SESSION['uploaded'] = "Sorry, only txt files are allowed.";
        $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    if(!isset($_SESSION['uploaded'])) {
        $_SESSION['uploaded'] = "Your file was not uploaded.";
    }
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $_SESSION['uploaded'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $_SESSION['uploaded'] = "Sorry, there was an error uploading your file.";
        $uploadOk = 0;
    }
}

if ($uploadOk == 1){
        $fileProcessor->parseFile();
}

ob_end_clean( );
header( 'Location: http://attorney-at-law.greenrivertech.net/test/dms/fileuploading.php' );
exit;
?>

