var LessonAddController = (function($) {
    function LessonAddController() {
        this.add = $('#lesson-add');

        this.add.on('submit', LessonAddController.prototype.onSubmit);
    }

    LessonAddController.prototype.onSubmit = function(e) {
        e.preventDefault();
        var action = $(this).attr('action'),
            data = $(this).serialize();

        $.post(action, data, LessonAddController.prototype.onSuccess);
    };

    LessonAddController.prototype.onSuccess = function(data, status, jqxhr) {
        $(document).trigger('lessons:create', {data: data});
    };

    return LessonAddController;
})(jQuery);