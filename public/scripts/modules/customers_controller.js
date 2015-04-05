var CustomersController = (function($) {
    function CustomersController(groupId) {
        this.groupId = groupId;
        this.tableClass = '.customers-table';
        this.initDataTable();
        this.initEvents();
    }

    CustomersController.prototype.getUrl = function() {
        var url = "customers/table";

        if (typeof this.groupId !== 'undefined') {
            url += '/' + this.groupId;
        }

        return url;
    };

    CustomersController.prototype.initDataTable = function() {

        this.datatables = $(this.tableClass).DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": this.getUrl(),
                "type": "POST"
            },
            columns: [
                {data: 'firstname', title: 'First name'},
                {data: 'lastname', title: 'Last name'},
                {data: 'phone', title: 'Phone'},
                {data: 'groupname', title: 'Group'},
                {data: 'operations', title: '', orderable: false, searchable: false}
            ]
        });
    };

    CustomersController.prototype.initEvents = function() {
        _this = this;
        $(this.tableClass + ' tbody').on('click', 'tr', function() {
            var rowData = _this.datatables.row(this).data();
            window.location.assign(rowData.show);
        });
    };

    return CustomersController;
})(jQuery);