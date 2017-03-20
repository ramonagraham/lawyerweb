<?php
session_start();
if (isset($_SESSION['login_user'])) {
    header("location:post.php");
}
include 'assets/includes/header.inc.php';

?>

    <title>Login</title>

<?php
include 'assets/includes/navbar.inc.php';


?>

    <link rel="stylesheet" href="assets/css/login.css">

    <!-- Main -->
    <div id="main">

        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h1>Log In</h1>
                </header>

                <div id="error-Message">

                </div>

                <!-- login form -->
                <form method="post">

                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="Enter username" name="username" id="username" required/>
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required/>
                    </div>

                    <div class="actions">
                        <input type="submit" name="submit" id="submit" value="Log In" class="special"/>
                    </div>

                </form>
            </div>
        </section>

    </div>

    <script src='assets/js/login.js'></script>

<?php
include_once 'assets/includes/footer.inc.php';
?>