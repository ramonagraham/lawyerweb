<?php
include 'header.php';
?>

    <title>Login</title>


<?php
include 'navbar.php';
?>

    <!-- Banner -->

    <!--    <section id="banner" class="major">
            <div class="inner">
                <span class="image">
                        <img src="images/office.jpg" alt="Northern Pacific Office Building"/>
                    </span>
                <header class="major">
                    <h1>Arthur DeLong</h1>
                </header>
                <div class="content">
                    <p>Full-service law firm focused on real estate, estate planning
                        business organization, and commercial transactions.</p>
                </div>
            </div>
        </section>-->

    <!-- Main -->
    <div id="main">


        <!-- Two -->
        <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Log In</h2>
                </header>

                <form action="process-login.php" method="post">

                    <div class="field">
                        <label>Username</label>
                        <input type="text" placeholder="Enter username" name="username" required/>
                    </div>

                    <div class="field">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Password" name="password" required/>
                    </div>

                    <div class="actions">
                        <input type="submit" name="submit" value="Log In" class="special"/>
                    </div>

                </form>
            </div>
        </section>

    </div>
<?php
include 'footer.php';
?>