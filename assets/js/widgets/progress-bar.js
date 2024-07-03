(function($) {
    'use strict';

    var $document_body = $(document.body);

    function tmProgressBarCounter(pBar, pPercent){
      var percent = parseFloat(pPercent);
      if(pBar.length) {
        pBar.each(function() {
          var current_item = $(this);
          current_item.css('opacity', '1');
          current_item.countTo({
            from: 0,
            to: percent,
            speed: 2000,
            refreshInterval: 50
          });
        });
      }
    }

    var WidgetProgressBarHandler = function ($scope) {
      var $progress_bar = $('.tm-sc-progress-bar');
      if( $progress_bar.length > 0 ) {
        $progress_bar.appear();
        $document_body.on('appear', '.tm-sc-progress-bar', function() {
          var current_item = $(this);
          if (!current_item.hasClass('appeared')) {
            var percentage = current_item.data('percent');
            var bar_height = current_item.data('bar-height');
            var percent = current_item.find('.percent');
            var bar_holder = current_item.find('.progress-holder');
            var bar = current_item.find('.progress-content');

            if (current_item.hasClass('progress-bar-default')) {
              tmProgressBarCounter(bar.find('span.value'), percentage);
            } else {
              tmProgressBarCounter(percent.find('span.value'), percentage);
            }
            
            bar.css('width', '0%').animate({'width': percentage + '%'}, 2000);

            if (current_item.hasClass('progress-bar-floating-percent')) {
              if( THEMEMASCOT.isRTL.check() ) {
                percent.css('right', '0%').animate({'right': percentage + '%'}, 2000);
              } else {
                percent.css('left', '0%').animate({'left': percentage + '%'}, 2000);
              }
            }

            if ( bar_height != '' ) {
              bar_holder.css('height', bar_height);
              bar.css('height', bar_height);
            }


            var barcolor = current_item.data('barcolor');
            bar.css('background-color', barcolor);
            current_item.addClass('appeared');
          }
          
        });
      }
    };

    //elementor front start
    $(window).on("elementor/frontend/init", function () {
        elementorFrontend.hooks.addAction(
            "frontend/element_ready/tm-ele-progress-bar.default",
            WidgetProgressBarHandler
        );
    });


})(jQuery);