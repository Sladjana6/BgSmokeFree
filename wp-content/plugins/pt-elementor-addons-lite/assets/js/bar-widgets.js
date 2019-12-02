(function ($) {
    var WidgetptStatsBarHandler = function ($scope, $) {

        $scope.find('.pt-stats-bar-content').each(function () {

            var dataperc = $(this).data('perc');

            $(this).animate({"width": dataperc + "%"}, dataperc * 20);

        });

    };

    var WidgetptStatsBarHandlerOnScroll = function ($scope, $) {

        $scope.waypoint(function (direction) {

            WidgetptStatsBarHandler($(this.element), $);

        }, {
            offset: Waypoint.viewportHeight() - 150,
            triggerOnce: true
        });

    };
    // Make sure you run this code under Elementor..
    $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/Pt-stats-bars.default', WidgetptStatsBarHandler);

    });

})(jQuery);