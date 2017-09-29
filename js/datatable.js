$(document).ready( function() {
    $('#table_id').dataTable({
    	"columnDefs": [
            {"className": "dt-center", "targets": "_all"}
          ],
          "order": [],
    });
});