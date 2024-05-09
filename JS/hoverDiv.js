$(document).ready(function () {
    $('.hover-div').hover(function () {
        $('.hover-div').stop().fadeTo('fast', 0.3);
        $(this).stop().fadeTo('fast', 1);
    }, function () {
        $('.hover-div').stop().fadeTo('fast', 1);
    });
});