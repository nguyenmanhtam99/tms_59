window.$ = window.jQuery = require('jquery');
var dt = require('datatables.net')();
require('bootstrap-sass');
require('jquery-ui');

$('#checkAll').click(function(e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});

$('.success_show').hide(2000);

$(document).ready(function() {
    /**
     * Add rows and remove rows
     */
    $('#addTask').click(function() {
        $('.task').append('<div class="allTask">' + $('.addRow').html() + '</div>');
    });

    $('#removeTask').click(function() {
        $('.task div.allTask:last-child').remove();
    });

    /**
    * Search table
    */
    $('#dataTables').DataTable();
});
