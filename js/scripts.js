/*
 * JAVASCRIPT FUNCTIONS
 *
 * This file should contain any JavaScript you want to add to the site.
 *
 * Child Theme Name: David Laietta April 2016 Genesis Child for Genesis v2.2.7
 * Author: David Laietta
 * Url: http://davidlaietta.com
 */

// as the page loads, call these scripts
jQuery(document).ready(function ($) {

    "use strict";

    (function ($) {

        // Click function that will work on .class on mobile devices
        $(function () {

            $(document).ready(function () {
                $(document).on('touchstart click', '.class', function (e) {
                    e.stopPropagation();
                    e.preventDefault();
                });
            });

        });

    }(jQuery));

    /*
    One method for handling responsive jQuery
    */

    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* if is below 960px */
    if (responsive_viewport < 960) {

        /* load gravatars */
        $('.comment img[data-gravatar]').each(function () {
            $(this).attr('src', $(this).attr('data-gravatar'));
        });


    }

}); /* end of as page load scripts */