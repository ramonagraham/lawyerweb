/**
 * JavaScript function that sets the tab in the navbar to active based on URL
 */

$( document ).ready(function() {
    var loc = window.location.href; // returns the full URL
    $(".button.special.active").removeClass("active");
    if(/services/.test(loc)) {
        $('#nav-services').addClass('active');
    } else if (/bios/.test(loc)) {
        $('#nav-bios').addClass('active');
    } else if (/contact/.test(loc)) {
        $('#nav-contact').addClass('active');
    } else {
        $('#nav-home').addClass('active');
    }
});
