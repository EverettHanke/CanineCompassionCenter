/**
 * AUTHORS: Everett, Pedro, Nathan
 * FILE: hoverDiv.js
 * PURPOSE: This script adds a hover effect to elements with the class 'hover-div'.
 * When an element is hovered over, all other elements fade to 30% opacity,
 * while the hovered element remains at full opacity.
 */
/*NTR 5/9 This is for the cards to have hover*/
$(document).ready(function () {
    $('.hover-div').hover(function () {
        $('.hover-div').stop().fadeTo('fast', 0.3);
        $(this).stop().fadeTo('fast', 1);
    }, function () {
        $('.hover-div').stop().fadeTo('fast', 1);
    });
});