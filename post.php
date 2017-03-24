<?php

/*
 *  Team Red Hot Chili Jellos
 *  Chris Barbour, Ramona Graham, Josh Lyon, Hillary Wagoner
 *  File: post.php
 *  Purpose: This file is the blog form to submit new blogs.
 */


session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}

include_once 'assets/includes/header.inc.php';
include_once 'assets/includes/navbar.inc.php';

?>
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/postblog.css">

    <!-- Page Title -->
    <section id="one">
        <div class="inner">
            <header class="major">
                <h1>Post Blog</h1>
            </header>
        </div>
    </section>

    <!-- Main -->
    <div id="main">

        <section id="postblog">
            <div class="inner">

                <div id="error-Message"><?php echo $_SESSION['file']; ?></div>

                <!-- Blog post form -->
                <form id='posting' method="post" action="assets/includes/process-blog.php"
                      enctype="multipart/form-data">

                    <div class="field">
                        <label for="title"><h3>Blog Title:</h3></label>
                        <input type="text" size="50" maxlength="255" name="title" id="title" required/>
                    </div>
                    <div class="field">
                        <label for="uploadImage"><h3>Browse image:</h3></label>
                        <input type="file" name="uploadImage" id="uploadImage"/>
                    </div>
                    <div class="field">
                        <label for="content"><h3>Content:</h3></label>
                        <textarea rows="10" name="content" id="content"></textarea>
                    </div>

                    <div class="actions">
                        <input type="submit" id="submit" name="submit" value="Submit post" class="special" required/>
                    </div>
                </form>
        </section>
    </div>
<?php
include_once 'assets/includes/footer.inc.php';
?>