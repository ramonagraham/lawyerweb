/**
 * Created by Hillary on 3/18/2017.
 */

$(document).ready(function () {

    $("#submit").click(function () {
        event.preventDefault();
        var content = $('#content').val();
        var title = $('#title').val();
        $.ajax({
            type: "POST",
            url: "assets/includes/process-blog.php",
            data: {
                submit: "submit",
                title: title,
                content: content
            },
            success: function (result) {
                console.log(result);
                if (result == "New record created successfully") {
                    alert(result);
                    window.location.reload();
                }

                else {
                    $('#error-Message').html(result);
                }
            }
        });
    });
});