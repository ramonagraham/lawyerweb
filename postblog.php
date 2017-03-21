<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location:login.php");
}

include_once 'assets/includes/header.inc.php';
include_once 'assets/includes/navbar.inc.php';
include_once 'assets/includes/process-blog.php';

$urlstuff = $_SERVER["QUERY_STRING"];
if ($urlstuff != false) {
    $id = substr($urlstuff, 8);

    $blog =  new BlogProcessing;
    $editblog = $blog->getBlogID($id);
}

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
                <form method="post" action="">

                    <div id="error-Message"></div>

                    <div class="field">
                        <label for="title"><h3>Blog Title:</h3></label>
                        <input type="text" size="50" maxlength="255" name="title" id="title"
                               value=" <?php echo $editblog[0]['title']; ?>">
                    </div>

                    <div class="field">
                        <label for="content"><h3>Content:</h3></label>
                        <textarea rows="10" name="content" id="content"
                                  ><?php echo $editblog[0]['content']; ?></textarea>
                    </div>

                    <div class="actions">
                        <input type="submit" id="submit" name="submit" value="Submit post" class="special"/>
                    </div>
                </form>
        </section>
    </div>
<!--    <script src = 'assets/js/postblog.js'></script>
-->    <script src = 'assets/js/linkedin.js'></script>
<?php
include_once 'assets/includes/footer.inc.php';
?>