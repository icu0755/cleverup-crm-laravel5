var CustomersEditController = (function($) {
    function CustomersEditController() {
        this.init();
    }

    CustomersEditController.prototype.init = function() {
        $('.datepicker').datepicker(Config.datepicker);
    };

    return CustomersEditController;
})(jQuery);