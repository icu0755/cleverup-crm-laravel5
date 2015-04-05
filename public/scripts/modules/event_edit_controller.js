var EventEditController = (function($) {
    function EventEditController() {
        this.initTimePicker();
    }

    EventEditController.prototype.initTimePicker = function() {
        $('.time').timepicker({
            'scrollDefault': 'now',
            'timeFormat': 'H:i'
        });

        $('.datepair').datepair({
            'defaultTimeDelta': 5400000
        });
    };

    return EventEditController;
})(jQuery);