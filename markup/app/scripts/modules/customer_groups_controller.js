var CustomerGroupsController = (function($) {
    function CustomerGroupsController() {
        this.tableClass = '.customer-groups-table';
        this.initDataTable();
    }

    CustomerGroupsController.prototype.initDataTable = function() {
        this.datatables = $(this.tableClass).DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "customer-groups/table",
                "type": "POST"
            },
            columns: [
                {data: 'groupname', title: 'Group'},
                {data: 'operations', title: '', orderable: false, searchable: false}
            ]
        });
    };

    return CustomerGroupsController;
})(jQuery);