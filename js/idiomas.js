$(document).ready(function() {
    $('#myTable').DataTable( {
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            
             {
                extend: 'excel',
                text: 'Exportar a Excel',
              /*  exportOptions: {
                    //Exportar columnas específicas
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                    
                }*/
               
            }

      ],
      
      "language": {
             "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "bFilter": false,
        
    } );
} );