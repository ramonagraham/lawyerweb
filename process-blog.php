<?php
/**
 * Created by PhpStorm.
 * User: Ramona
 * Date: 2/24/2017
 * Time: 12:03 PM
 */

include ("blogs-dbconnect.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = mysqli_real_escape_string($dbc, $_POST['title']);
    $content = mysqli_real_escape_string($dbc, $_POST['content']);

    $sql = "INSERT INTO posts(title, content) VALUES ('$title', '$content')";

    if (mysqli_query($dbc, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    }
}
