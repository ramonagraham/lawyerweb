<?php
    require '/home/attorneyatlaw/dbcon.php';
    require 'fileprocessing.php';

    $dbcon = new DbConn();
    $conn = $dbcon->getConnection();
    if(isset($_POST['keyword'])){
        $fileProcessing = new FileProcessing($conn,'file1');
        $result = $fileProcessing->getSearchResults($_POST['keyword']);
        $result = json_encode($result);
        echo $result;
        return $result;
    }

?>