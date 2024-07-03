(function($) {
    'use strict';


    var WidgetProjectsBlock2Handler = function ($scope) {

        $('.project-layout .projects-current-theme1').hover(function() {
            $(this).siblings('.projects-current-theme1').removeClass('active'), $(this).addClass('active')
        })


        if ($('.projects-current-theme1').length) {
            var $projects_block = $('.projects-current-theme1 .inner-box');
            $($projects_block).on('mouseenter', function (e) {
                $(this).find('.content-box .inner').stop().slideDown(400);
                return false;
            });
            $($projects_block).on('mouseleave', function (e) {
                $(this).find('.content-box .inner').stop().slideUp(400);
                return false;
            });
        }
    };

    //elementor front start
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/tm-ele-cpt-projects.skin-style-current-theme1",
            WidgetProjectsBlock2Handler
        );
    });


})(jQuery);