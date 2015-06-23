jQuery(function($) {
    var currentPage = $('body').attr('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    switch (currentPage) {
        case 'customers':
            new CustomersController();
            break;
        case 'customer-groups':
            new CustomerGroupsController();
            break;
        case 'customer-edit':
            new CustomersEditController();
            break;
        case 'event-edit':
            new EventEditController();
            break;
        case 'events':
            new EventsController({
                newEventUrl: './events/add',
                eventsUrl: './api/events'
            });
            break;
        case 'lesson':
            $(document).on('lessons:create', function(e, data){
                $('#lessons').html(data.data);
            });

            new LessonAddController();
            break;
        default:
    }
});
