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

<!-- Validate Captcha-->
<?php
if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '9LuDh9kyetYYYYdT0jsVckScsH8Ks3KA';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.
            $secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):
            //contact form submission code
            $name = !empty($_POST['name'])?$_POST['name']:'';
            $email = !empty($_POST['email'])?$_POST['email']:'';
            $message = !empty($_POST['message'])?$_POST['message']:'';

            $to = 'contact@codexworld.com';
            $subject = 'New contact form have been submitted';
            $htmlContent = "
                <h1>Contact request details</h1>
                <p><b>Name: </b>".$name."</p>
                <p><b>Email: </b>".$email."</p>
                <p><b>Message: </b>".$message."</p>
            ";
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            // More headers
            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
            //send email
            @mail($to,$subject,$htmlContent,$headers);

            $succMsg = 'Your contact request have submitted successfully.';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>

<!-- Contact Form-->
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