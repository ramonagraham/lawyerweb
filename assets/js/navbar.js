/**
 * JavaScript function that sets the tab in the navbar to active based on URL
 */

$( document ).ready(function() {
    // returns the full URL
    var loc = window.location.href;

    //removes the active class name from the current active button
    $(".button.special.active").removeClass("active");

    //if block to add the active class dependent on the url
    if(/services/.test(loc)) {
        $('#nav-services').addClass('active');
    } else if (/bios/.test(loc)) {
        $('#nav-bios').addClass('active');
    } else if (/contact/.test(loc)) {
        $('#nav-contact').addClass('active');
    } else if (/blog/.test(loc)) {
        $('#nav-blog').addClass('active');
    } else {
        console.log(loc);
        $('#nav-home').addClass('active');
    }
});
