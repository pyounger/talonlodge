$('document').ready(function(){
    $('#example').dataTable({
        "sPaginationType": "bootstrap",
        "bSearchable":false,
        "bInfo":false,
        "bPaginate": false,
        "bFilter": false,
        "bSort": true,
        "aaSorting": [[ 1, "asc" ]]
    });
    $('#example2').dataTable({
        "sPaginationType": "bootstrap",
        "bSearchable":false,
        "bInfo":false,
        "bPaginate": false,
        "bFilter": false,
        "bSort": true,
        "aaSorting": [[ 1, "asc" ]]
    });
});