<?php
    include 'header.php';
?>
<!-- Main -->
    <!-- Contact -->
    <section id="contact">
        <div class="inner">
            <section>
                <form method="post" action="#">
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
                        <span>621 Pacific Ave<br />
                            Suite 209<br />
                            Tacoma, WA 98402</span>
                    </div>
                </section>
            </section>
        </div>
    </section>
<?php
    include 'footer.php';
?>