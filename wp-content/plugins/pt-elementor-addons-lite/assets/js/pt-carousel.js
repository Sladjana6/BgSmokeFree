(function ($) {
    var WidgetPTCarouselHandler = function ($scope, $) {

        var carousel_elem = $scope.find('.pt-carousel, .pt-posts-carousel').eq(0);

        if (carousel_elem.length > 0) {

            var settings = carousel_elem.data('settings');

            var arrows = settings['arrows'];

            var dots = settings['dots'];

            var autoplay = settings['autoplay'];

            var autoplay_speed = parseInt(settings['autoplay_speed']) || 3000;

            var animation_speed = parseInt(settings['animation_speed']) || 300;

            var fade = settings['fade'];

            var pause_on_hover = settings['pause_on_hover'];

            var display_columns = parseInt(settings['display_columns']) || 4;

            var scroll_columns = parseInt(settings['scroll_columns']) || 4;

            var tablet_width = parseInt(settings['tablet_width']) || 800;

            var tablet_display_columns = parseInt(settings['tablet_display_columns']) || 2;

            var tablet_scroll_columns = parseInt(settings['tablet_scroll_columns']) || 2;

            var mobile_width = parseInt(settings['mobile_width']) || 480;

            var mobile_display_columns = parseInt(settings['mobile_display_columns']) || 1;

            var mobile_scroll_columns = parseInt(settings['mobile_scroll_columns']) || 1;

            carousel_elem.slick({
                arrows: arrows,
                dots: dots,
                infinite: true,
                autoplay: autoplay,
                autoplaySpeed: autoplay_speed,
                speed: animation_speed,
                fade: false,
                pauseOnHover: pause_on_hover,
                slidesToShow: display_columns,
                slidesToScroll: scroll_columns,
                responsive: [
                    {
                        breakpoint: tablet_width,
                        settings: {
                            slidesToShow: tablet_display_columns,
                            slidesToScroll: tablet_scroll_columns
                        }
                    },
                    {
                        breakpoint: mobile_width,
                        settings: {
                            slidesToShow: mobile_display_columns,
                            slidesToScroll: mobile_scroll_columns
                        }
                    }
                ]
            });
        }

    };
	var WidgetLAEPiechartsHandler = function ($scope, $) {

        $scope.find('.pt-piechart .pt-percentage').each(function () {

            var track_color = $(this).data('track-color');
            var bar_color = $(this).data('bar-color');

            $(this).easyPieChart({
                animate: 2000,
                lineWidth: 10,
                barColor: bar_color,
                trackColor: track_color,
                scaleColor: false,
                lineCap: 'square',
                size: 220

            });

        });

    };
	 var WidgetLAEPiechartsHandlerOnScroll = function ($scope, $) {

        $scope.waypoint(function (direction) {

            WidgetLAEPiechartsHandler($(this), $);

        }, {
            offset: $.waypoints('viewportHeight') - 100,
            triggerOnce: true
        });

    };
	var WidgetLAEPortfolioHandler = function ($scope, $) {

        if ($().isotope === undefined) {
            return;
        }

        var container = $scope.find('.pt-portfolio');
        if (container.length === 0) {
            return; // no items to filter or load and hence don't continue
        }

        // layout Isotope after all images have loaded
        var htmlContent = $scope.find('.js-isotope');

        var isotopeOptions = htmlContent.data('isotope-options');

        htmlContent.isotope({
            // options
            itemSelector: isotopeOptions['itemSelector'],
            layoutMode: isotopeOptions['layoutMode']
        });

        htmlContent.imagesLoaded(function () {
            htmlContent.isotope('layout');
        });

        /* -------------- Taxonomy Filter --------------- */

        $scope.find('.pt-taxonomy-filter .pt-filter-item a').on('click', function (e) {
            e.preventDefault();

            var selector = $(this).attr('data-value');
            container.isotope({filter: selector});
            $(this).closest('.pt-taxonomy-filter').children().removeClass('pt-active');
            $(this).closest('.pt-filter-item').addClass('pt-active');
            return false;
        });

    };


    // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/Pt-post-carousel.default', WidgetPTCarouselHandler);
		elementorFrontend.hooks.addAction('frontend/element_ready/Pt-clients-list.default', WidgetPTCarouselHandler);
		 elementorFrontend.hooks.addAction('frontend/element_ready/Pt-piecharts.default', WidgetLAEPiechartsHandler);
		  elementorFrontend.hooks.addAction('frontend/element_ready/Pt-blog-post-grid.default', WidgetLAEPortfolioHandler);

    });

})(jQuery);