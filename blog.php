<?php
include 'assets/includes/header.inc.php';
require_once '/home/attorneyatlaw/dbcon.php';
include_once 'assets/includes/process-blog.php';
?>


    <title>Arthur DeLong Blogs</title>
    <meta name="description" content="Arthur's blogs are about relevant information regarding real estate,
    business organization, estate planning, or commercial laws">

<?php
include 'assets/includes/navbar.inc.php';
?>
<link rel="stylesheet" href="assets/css/blog.css"/>
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
                        echo "<div class='blogRow'>";
                        echo "<div class='title'>";
                        echo '<h1>' . $row['title'] . '</h1>';
                        echo "</div>";
                        echo "<div class='contentPost'>";
                        echo '<p>';
                        if($row['image'] != null) {
                            echo "<div class='image'>";
                            echo "<img src='assets/includes/" . $row['image'] . "'" . "alt=''/>";
                            echo "</div>";
                        }
                        echo $row['content'] . "</p>";
                        echo "</div>";
                        echo "</div>";


                    }
                    ?>
                    <hr class="major"/>
                </section>
            </div>
        </section>

    </div>

<?php
include_once 'assets/includes/footer.inc.php';
?>