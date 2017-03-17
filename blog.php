<?php
include_once 'header.php';
require_once '/home/attorneyatlaw/dbcon.php';
include_once 'assets/includes/process-blog.php';
?>


    <title>Arthur DeLong Blogs</title>
    <meta name="description" content="Arthur's blogs are about relevant information regarding real estate,
    business organization, estate planning, or commercial laws">

<?php
include 'navbar.php';
?>

    <!-- Banner -->
    <!-- Note: The "styleN" class below should match that of the header element. -->
    <section id="banner" class="style2">
        <div class="inner">
            <span class="image">
                <img src="images/blog.jpg" alt="Blog Words"/>
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
                    $retrieveBlogs = new BlogProcessing();
                    $result = $retrieveBlogs->getBlogs();

                    foreach ($result as $row) {
                        echo '<h1>' . $row['title'] . '</h1>';
                        echo '<p>' . $row['content'] . '</p>';
                    }
                    ?>
                    <hr class="major"/>
                </section>
            </div>
        </section>

    </div>

<?php
include 'footer.php';
?>