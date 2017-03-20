/**
 * Created by Hillary on 3/10/2017.
 */

$(document).ready(function () {

    $('#submit').click(function () {
        event.preventDefault();
        var username= $('#username').val();
        var password= $('#password').val();
        $.ajax ({

            type: "POST",
            url: "assets/includes/process-login.php",
            data: {submit : "submit", username: username, password:password},
            success: function (result) {
                console.log(result);
                if(result == 'logged in') {
                    window.location.replace('post.php');
                }
                else
                {

                    $('#error-Message').html(result);
                }
            }
        });

    })
    });