<?php
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

                <!-- Blog post form -->
                <form method="post" action="" enctype="multipart/form-data">

                    <div id="error-Message"></div>

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
    <script src = 'assets/js/postblog.js'></script>
<?php
include_once 'assets/includes/footer.inc.php';
?>