/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
import '../scss/app.scss';

import $ from 'jquery';
import 'bootstrap'; // adds functions to jQuery
import '@fortawesome/fontawesome-free'; // adds functions to jQuery

// uncomment if you have legacy code that needs global variables
//global.$ = $;

$('.blurred').hover(function () {
   $(this).children().addClass('text-blur-out');
   $(this).addClass('transition');
   $(this).removeClass('blurred');
}, function(){
    $(this).children().removeClass('text-blur-out');
    $(this).addClass('blurred');
    $(this).addClass('text-focus-in');
});

$('.dropdown-toggle').dropdown();
$('.custom-file-input').on('change', function(event) {
    let inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});