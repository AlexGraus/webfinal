$(document).ready(function() {
    $('#tablita').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
             {
                extend: 'excel',
                text: 'Exportar a Excel'
            }

      ],
      
      "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "bFilter": true,
        
        


    } );
} );