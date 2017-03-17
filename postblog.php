<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}

include_once 'header.php';
include_once 'navbar.php';
include_once "assets/includes/process-blog.php";

?>


<form method="post" action="">
    <fieldset>
        Post Title:&nbsp;
        <br>
        <input type="text" size="50" maxlength="255" name="title" id="title">&nbsp
        <br>
        <label>Content:<br>
            <textarea rows="10" name="content" id="content"></textarea>
        </label>
    </fieldset>

    <p><input type="submit" id="submit" name="submit" value="Submit post" /></p>
</form>

<?php
include_once 'footer.php';
?>