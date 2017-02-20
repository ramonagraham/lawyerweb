<?php
session_start();
    require '/home/attorneyatlaw/dbcon.php';
    require 'fileprocessing.php';
    $_SESSION['uploaded'] ='';
    $dbcon = new DbConn();
    $conn = $dbcon->getConnection();
    if(isset($_POST['keyword'])){
        $fileProcessing = new FileProcessing($conn,'file1');
        $result = $fileProcessing->getSearchResults($_POST['keyword']);
        $result = json_encode($result);
        echo $result;
    }

?>