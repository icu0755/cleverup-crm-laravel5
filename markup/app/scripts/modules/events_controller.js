var EventsController = (function($) {
    function EventsController(options) {
        this.options = options;
        this.calendarClass = '.calendar';
        this.initCalendar();
    }

    EventsController.prototype.initCalendar = function() {
        var _this = this;

        this.calendar = $(this.calendarClass).fullCalendar({
            allDaySlot: false,
            contentHeight: 'auto',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            defaultDate: '2014-11-12',
            defaultView: 'agendaWeek',
            editable: false,
            handleWindowResize: false,
            minTime: '12:00',
            timeFormat: 'H(:mm)',
            axisFormat: 'H(:mm)',
            selectable: true,
            selectHelper: true,
            selectOverlap: false,
            select: function(start, end) {
                var url = _this.options.newEventUrl + '/' + start.format() + '/' + end.format()
                window.location.assign(url);
            },
            events: {
                url: _this.options.eventsUrl,
                type: 'POST'
            }
        });
    };

    return EventsController;
})(jQuery);