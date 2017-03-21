<?php
include 'assets/includes/header.inc.php';
require_once '/home/attorneyatlaw/dbcon.php';
include_once 'assets/includes/process-blog.php';

$urlstuff = $_SERVER["QUERY_STRING"];
if ($urlstuff != false) {
    $id = substr($urlstuff, 8);

    $blog =  new BlogProcessing;
    $editblog = $blog->deleteBlog($id);
}
?>


    <title>Arthur DeLong Blogs</title>
    <meta name="description" content="Arthur's blogs are about relevant information regarding real estate,
    business organization, estate planning, or commercial laws">

<?php
include 'assets/includes/navbar.inc.php';
?>

    <!-- Banner -->
    <!-- Note: The "styleN" class below should match that of the header element. -->
    <section id="banner" class="style2">
        <div class="inner">
            <span class="image">
                <img src="assets/images/blog.jpg" alt="Blog Words"/>
            </span>
            <header class="major">
                <h1>Blog</h1>
            </header>
            <div class="content">

            </div>
        </div>
    </section>

    <!-- Main -->
    <div id="main">
        <!-- One -->
        <section id="one">
            <div class="inner">
                <section>
                    <?php
                    //create new instance of class
                    $retrieveBlogs = new BlogProcessing();
                    //get result of getBlogs function
                    $result = $retrieveBlogs->getBlogs();

                    //display all blogs in Database
                    foreach ($result as $row) {
                        echo '<h1>' . $row['title'] . '</h1>';
                        echo '<p>' . $row['content'] . '</p>';
                        session_start();
                        if (isset($_SESSION['login_user'])) {
                            echo '<a href="postblog.php?blog_id=' . $row['blog_id'] . '" class="icon alt fa-pencil"><span>Edit</span></a><br>';
                            echo '<a href="blog.php?blog_id=' . $row['blog_id'] . '" class="icon alt fa-trash"><span>Delete</span></a>';
                        }
                        echo '<hr class="major">';
                    }
                    ?>
                </section>
            </div>
        </section>

    </div>
<?php
include_once 'assets/includes/footer.inc.php';
?>