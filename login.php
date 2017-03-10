<?php

/*if (isset($_SESSION['login_user'])) {
    header("location:postblog.php");
}*/
include 'header.php';
?>

    <title>Login</title>

<?php
include 'navbar.php';


?>
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
                <form method="post">

                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="Enter username" name="username" id="username" required/>
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" name="password" id="password" required />
                    </div>

                    <div class="actions">
                        <input type="submit" name="submit" id="submit" value="Log In" class="special"  />
                    </div>

                </form>
            </div>
        </section>

    </div>

    <script src = 'assets/js/login.js'></script>

<?php
include 'footer.php';
?>