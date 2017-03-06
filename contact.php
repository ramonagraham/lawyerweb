<?php
include 'header.php';
?>

    <title>Contact Arthur</title>
    <meta name="description" content="Contact Arthur using the form, call, or e-mail">

<?php
include 'navbar.php';
?>

    <link rel="stylesheet" href="assets/css/contact.css">

    <!-- Main -->
    <div id="main" class="alt">

        <!-- One -->
        <section id="one">
            <div class="inner">
                <header class="major">
                    <h1>Contact Arthur</h1>
                </header>
            </div>
        </section>

    </div>

    <!-- Contact Form-->
    <section id="contact">
        <div class="inner">
            <section>
                <form id="contact-form" method="post" action="">
                    <div class="field half first">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value ="<?php echo $name; ?>"required/>
                    </div>
                    <div class="field half">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $email; ?>"required/>
                    </div>
                    <div class="field">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="6" required><?php echo $message; ?></textarea>

                    </div>

                    <div class="g-recaptcha" data-sitekey="6Ldo8BMUAAAAACw716jeK8UmL-CqSWC8uPtqonHI">

                    </div>

                    <ul class="actions">
                        <li><input type="button" id = 'submit' name="submit" value="Send Message" class="special"/></li>
                        <li><input type="reset" value="Clear"/></li>
                    </ul>
                </form>
            </section>

            <section class="split">
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-envelope"></span>
                        <h3>Email</h3>
                        <a href="#">arthur@richardlevenson.com</a>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-phone"></span>
                        <h3>Phone</h3>
                        <span>(253) 572-4109</span>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-home"></span>
                        <h3>Address</h3>
                        <br>621 Pacific Ave<br/>
                        Suite 209</br>
                        Tacoma, WA 98402</span>
                    </div>
                </section>
            </section>
        </div>
    </section>

<script src = 'assets/js/contact.js'></script>


<?php
include 'footer.php';
?>