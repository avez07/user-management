let table = new DataTable("#myTable", {
    columnDefs: [{ targets: [0, 9], orderable: false }],
    lengthMenu: [5, 20, 50, 100],
});

let table_2 = new DataTable("#myTable-2", {
    columnDefs: [{ targets: [4], orderable: true }],
    lengthMenu: [5, 20, 50, 100],
});

let table_3 = new DataTable("#myTable-3", {
    columnDefs: [{ targets: [3], orderable: true }],
    lengthMenu: [5, 20, 50, 100],
});

var datatable = $('#trackingTable').DataTable({
    ajax: {
        url: 'https://aipexworldwide.com/live/v2config/CourierAssignFresh',
        type: 'GET',
        headers: {
            'Authorization': 'Ad_25d6ab1a4964MMmmbhfa541ea964366c3c7ec9e',
            'origin':'*',
            'content-type':'application/json',
            'Access-Control-Allow-Origin':'*',
            'Access-Control-Allow':'*',

            'Access-Control-Allow-Methods':'GET, PUT, POST, DELETE, OPTIONS'
        },
        dataSrc: function(response) {
            if (response.success == true) {
                return response
                    .data; // Assuming your data is under the 'data' key in the response
            } else {
                return []; // Return an empty array to show no data in the datatable
            }
        },
        error: function(xhr, status, error) {
            console.log("Error:", error); // Return an empty array in case of an error
        }
    },
    select: {
        style: 'multi',
    },
    columns: [{
            data: null,
            orderable: false,
            className: 'select-checkbox',
            defaultContent: '',
            createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                if (rowData.assign == 'Pickup' || rowData.assign == 'Delivery') {
                    $(cell).addClass('select-checkbox');
                } else {
                    $(cell).removeClass('select-checkbox');
                }
            }
        }, {
            data: 'awb'
        }, {
            data: 'assign'
        },
        {
            data: 'address'
        },
        {
            data: 'totalWeight'
        }, {
            data: 'pickupDate'
        },
        {
            data: 'paymentDetails'
        },
        {
            data: 'status'
        }
    ],
    order: [
        [1, 'asc']
    ] // Order by tracking number column
});

