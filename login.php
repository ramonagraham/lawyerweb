<?php
include 'header.php';
?>

<title>Login</title>


<?php
include 'navbar.php';
?>

    <!-- Banner -->

    <section id="banner" class="major">
        <div class="inner">
            <span class="image">
                    <img src="images/office.jpg" alt="Northern Pacific Office Building"/>
                </span>
            <header class="major">
                <h1>The Law Offices of Richard Levenson</h1>
            </header>
            <div class="content">
                <p>Full-service law firm focused on real estate,
                    business organization, and commercial transactions.</p>
            </div>
        </div>
    </section>

    <!-- Main -->
    <div id="main">


        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Log In</h2>
                </header>
                <form action="process-login.php" method="post">

                    <label>Username</label>
                    <input type="text" placeholder="Enter username" name="username" required >

                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button type="submit" name="submit" value="Login">Enter</button>


                </form>
            </div>
        </section>

    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <ul class="icons">
                <li><a target="_blank" href="http://www.twitter.com" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a target="_blank" href="http://www.facebook.com" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a target="_blank" href="http://www.linkedin.com" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
            </ul>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]>
    <script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

</body>
</html></div>
