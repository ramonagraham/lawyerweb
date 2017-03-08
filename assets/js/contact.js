/**
 * Created by Hillary on 3/6/2017.
 */

$(document).ready(function () {
    $("#submit").click(function() {
        var name = $('#name').val();
        var message = $('#message').val();
        var email = $('#email').val();
        var grecaptcharesponse = grecaptcha.getResponse();
        $.ajax({
            type: "POST",
            url:"ValidateContactPage.php",
            data: {
                submit: "submit",
                name: name,
                message: message,
                email: email,
                grecaptcha : grecaptcharesponse
            },
            success: function(result) {
                console.log(result);
                if(result == "Your contact request have submitted successfully.") {
                    $('#contact-form')[0].reset();
                    grecaptcha.reset();
                }
                alert(result);
            }
        });
    });
});