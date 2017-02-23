<!--The MIT License (MIT)

Copyright (c)
2017
    Hillary Wagoner, Ramona Graham, Josh Lyon, Chris Barbour

        Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
        documentation files (the "Software"), to deal in the Software without restriction, including without limitation
        the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and
        to permit persons to whom the Software is furnished to do so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all copies or substantial portions of
        the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO
        THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
        CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
        DEALINGS IN THE SOFTWARE.-->


<?php
include 'header.php';
?>

<title>Contact Us</title>
<meta name="description" content="Contact us using the form, call, or e-mail">

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
                <h1>Contact Us</h1>
            </header>
        </div>
    </section>

</div>

<!-- Contact -->
<section id="contact">
    <div class="inner">
        <section>
            <form method="post" action="https://www.google.com/recaptcha/api/siteverify">
                <div class="field half first">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name"/>
                </div>
                <div class="field half">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"/>
                </div>
                <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="6"></textarea>
                </div>
                <div class="g-recaptcha" data-sitekey="6Ldo8BMUAAAAACw716jeK8UmL-CqSWC8uPtqonHI">

                </div>
                <ul class="actions">
                    <li><input type="submit" value="Send Message" class="special"/></li>
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


</div>

<?php
include 'footer.php';
?>