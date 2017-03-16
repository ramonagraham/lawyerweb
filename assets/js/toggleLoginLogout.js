/**
 * Created by Hillary on 3/15/2017.
 */


$(document).ready(function() {
    $.post('assets/includes/getLoginSession.php', {}, function (data) {
        if (data == "true") {
            $('#nav-logout').removeClass('hide-tab');
        } else {
            $('#nav-logout').addClass('hide-tab');
        }
    });
});