/**
 * Created by Hillary on 3/18/2017.
 */

$(document).ready(function () {

    $("#submit").click(function () {
        event.preventDefault();
        var content = $('#content').val();
        var title = $('#title').val();
        var image = $('#uploadImage').val();
        $.ajax({
            type: "POST",
            url: "assets/includes/process-blog.php",
            data: {
                submit: "submit",
                title: title,
                content: content,
                image: image
            },
            success: function (result) {
                console.log(result);
                if (result == "New record created successfully") {
                    alert(result);
                    window.location.reload();
                }

                else {
                    alert(result);
                    //$('#error-Message').html(result);
                }
            }
        });
    });
});