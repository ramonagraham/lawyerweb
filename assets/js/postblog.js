/**
 * Created by Hillary on 3/18/2017.
 */

$(document).ready(function () {

    $("#submit").click(function () {
        event.preventDefault();
        var content = $('#content').val();
        var title = $('#title').val();
        var image = $('#uploadImage').files[0];
        $.ajax({
            type: "POST",
            url: "assets/includes/process-blog.php",
            data: {
                submit: "submit",
                title: title,
                content: content,
                image: uploadImage
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