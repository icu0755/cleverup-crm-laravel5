var CalendarController = (function() {
    function CalendarController() {
        this.calendar = $('#calendar').fullCalendar({
            defaultView: 'agendaWeek',
            events: {
                url: 'fixtures/events.json',
                data: {
                    group_id: 2
                },
                type: 'GET'
            },
            minTime: '12:00',
            maxTime: '21:00',
            timeFormat: 'H(:mm)',
            axisFormat: 'H(:mm)'
        });
    }

    return CalendarController;
})();